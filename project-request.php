<?php
declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;

require __DIR__ . '/includes/config.php';

/*
 * JOVEL CREATIVE, PROJECT REQUEST HANDLER
 *
 * Accepts only POST requests from the public Start a Project form.
 * It stores nothing and accepts no files. Delivery uses PHPMailer over
 * authenticated SMTP.
 *
 * Dependencies are installed from composer.json into /vendor.
 * The tracked /private-config/mail-config.php file is a secret-free loader.
 * Real SMTP credentials live outside the public web root in the account's
 * ~/.config/jovelcreative/mail-config.php file and are never committed.
 */

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    exit('Method not allowed.');
}

function project_redirect(string $status): never
{
    header('Location: /start-a-project?status=' . rawurlencode($status), true, 303);
    exit;
}

function project_line(string $key, int $max): string
{
    $value = trim((string) ($_POST[$key] ?? ''));
    $value = str_replace(["\r", "\n", "\0"], ' ', $value);
    return strlen($value) <= $max ? $value : substr($value, 0, $max);
}

function project_text(string $key, int $max): string
{
    $value = trim((string) ($_POST[$key] ?? ''));
    $value = str_replace("\0", '', $value);
    return strlen($value) <= $max ? $value : substr($value, 0, $max);
}

function project_choice(string $key, array $allowed, string $fallback = ''): string
{
    $value = (string) ($_POST[$key] ?? '');
    return in_array($value, $allowed, true) ? $value : $fallback;
}

/* A filled honeypot or implausibly fast submission is treated as success so
 * automated senders are not told how they were caught. */
$honeypot = trim((string) ($_POST['website_url'] ?? ''));
$started  = (int) ($_POST['form_started'] ?? 0);
$age      = time() - $started;
if ($honeypot !== '' || $started <= 0 || $age < 2 || $age > 86400) {
    project_redirect('sent');
}

$name          = project_line('name', 100);
$businessName  = project_line('business_name', 140);
$email         = project_line('email', 160);
$phone         = project_line('phone', 40);
$targetDate    = project_line('target_date', 20);
$problem       = project_text('problem', 2500);
$desiredResult = project_text('desired_result', 1600);
$anythingElse  = project_text('anything_else', 1600);

$serviceInterest = project_choice('service_interest', [
    'not-sure', 'tracker', 'calculator', 'client-document', 'sop', 'refresh', 'toolkit', 'other',
], 'not-sure');

$currentSetup = project_choice('current_setup', [
    'not-sure', 'spreadsheets', 'documents', 'notes-email', 'software', 'mixed', 'nothing-formal',
], 'not-sure');

$timeline = project_choice('timeline', [
    'no-deadline', 'within-month', 'two-four-weeks', 'one-two-weeks', 'specific-date',
]);

$budget = project_choice('budget', [
    'not-sure', 'under-500', '500-999', '1000-1499', '1500-2999', '3000-plus',
], 'not-sure');

$privacyAck = (string) ($_POST['privacy_ack'] ?? '');

if (
    $name === ''
    || $businessName === ''
    || !filter_var($email, FILTER_VALIDATE_EMAIL)
    || $problem === ''
    || $desiredResult === ''
    || $timeline === ''
    || $privacyAck !== 'yes'
) {
    project_redirect('invalid');
}

if ($timeline === 'specific-date' && $targetDate === '') {
    project_redirect('invalid');
}

if ($timeline !== 'specific-date') {
    $targetDate = '';
}

if ($targetDate !== '' && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $targetDate)) {
    project_redirect('invalid');
}

/* Reject unexpectedly link-heavy free text without storing it. */
$combinedText = $problem . "\n" . $desiredResult . "\n" . $anythingElse;
if (preg_match_all('~https?://~i', $combinedText) > 5) {
    project_redirect('sent');
}

$labels = [
    'not-sure'         => 'Not sure yet',
    'tracker'          => 'Tracker or operational spreadsheet',
    'calculator'       => 'Calculator or planning tool',
    'client-document'  => 'Proposal or client document',
    'sop'              => 'SOP or process guide',
    'refresh'          => 'Document refresh or redesign',
    'toolkit'          => 'Connected toolkit or system',
    'other'            => 'Something else',
    'spreadsheets'     => 'Spreadsheets',
    'documents'        => 'Documents or PDFs',
    'notes-email'      => 'Notes, email or messages',
    'software'         => 'Existing business software',
    'mixed'            => 'A mix of several things',
    'nothing-formal'   => 'Nothing formal yet',
    'no-deadline'      => 'No hard deadline',
    'within-month'     => 'Within about a month',
    'two-four-weeks'   => 'Within 2 to 4 weeks',
    'one-two-weeks'    => 'Within 1 to 2 weeks',
    'specific-date'    => 'Specific date',
    'under-500'        => 'Under $500',
    '500-999'          => '$500 to $999',
    '1000-1499'        => '$1,000 to $1,499',
    '1500-2999'        => '$1,500 to $2,999',
    '3000-plus'        => '$3,000+',
];

$display = static function (string $value) use ($labels): string {
    return $labels[$value] ?? $value;
};

$body = implode("\r\n", [
    'NEW JOVEL CREATIVE PROJECT INQUIRY',
    '=================================',
    '',
    'Name: ' . $name,
    'Business: ' . $businessName,
    'Email: ' . $email,
    'Phone: ' . ($phone !== '' ? $phone : 'Not provided'),
    '',
    'LIKELY SERVICE',
    $display($serviceInterest),
    '',
    'CURRENT SETUP',
    $display($currentSetup),
    '',
    'TIMELINE',
    $display($timeline),
    'Specific deadline: ' . ($targetDate !== '' ? $targetDate : 'Not provided'),
    '',
    'APPROXIMATE BUDGET',
    $display($budget),
    '',
    'WHAT IS NOT WORKING',
    $problem,
    '',
    'DESIRED RESULT',
    $desiredResult,
    '',
    'ANYTHING ELSE',
    $anythingElse !== '' ? $anythingElse : 'Nothing provided',
    '',
    'Privacy acknowledgment: Yes',
]);

$autoloadPath = __DIR__ . '/vendor/autoload.php';
$configPath   = __DIR__ . '/private-config/mail-config.php';

if (!is_readable($autoloadPath)) {
    error_log('Jovel Creative project form: Composer dependencies are not installed.');
    project_redirect('error');
}
if (!is_readable($configPath)) {
    error_log('Jovel Creative project form: SMTP configuration file is missing.');
    project_redirect('error');
}

require $autoloadPath;
$mailConfig = require $configPath;

if (!is_array($mailConfig)) {
    error_log('Jovel Creative project form: SMTP configuration is invalid.');
    project_redirect('error');
}

$smtpHost   = trim((string) ($mailConfig['host'] ?? ''));
$smtpPort   = (int) ($mailConfig['port'] ?? 0);
$encryption = strtolower(trim((string) ($mailConfig['encryption'] ?? '')));
$smtpUser   = trim((string) ($mailConfig['username'] ?? ''));
$smtpPass   = (string) ($mailConfig['password'] ?? '');
$from       = trim((string) ($mailConfig['from'] ?? $smtpUser));
$to         = trim((string) ($mailConfig['to'] ?? CONTACT_EMAIL));

if (
    $smtpHost === ''
    || $smtpPort <= 0
    || $smtpUser === ''
    || $smtpPass === ''
    || !filter_var($from, FILTER_VALIDATE_EMAIL)
    || !filter_var($to, FILTER_VALIDATE_EMAIL)
    || !in_array($encryption, ['smtps', 'starttls'], true)
) {
    error_log('Jovel Creative project form: SMTP configuration is incomplete or invalid.');
    project_redirect('error');
}

try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = $smtpHost;
    $mail->Port       = $smtpPort;
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtpUser;
    $mail->Password   = $smtpPass;
    $mail->SMTPSecure = $encryption === 'smtps'
        ? PHPMailer::ENCRYPTION_SMTPS
        : PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Timeout    = 25;
    $mail->CharSet    = PHPMailer::CHARSET_UTF8;
    $mail->Encoding   = PHPMailer::ENCODING_8BIT;

    $mail->setFrom($from, 'Jovel Creative');
    $mail->addAddress($to, 'Jovel Creative');
    $mail->addReplyTo($email, $name);

    $mail->Subject = 'New project inquiry from jovelcreative.com';
    $mail->isHTML(false);
    $mail->Body = $body;

    $mail->send();
} catch (Throwable) {
    error_log('Jovel Creative project form: SMTP delivery failed.');
    project_redirect('error');
}

project_redirect('sent');
