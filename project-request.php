<?php
declare(strict_types=1);

require __DIR__ . '/includes/config.php';

/*
 * JOVEL CREATIVE, PROJECT REQUEST HANDLER
 *
 * This endpoint accepts only POST requests from the public Start a Project
 * form. It stores nothing and accepts no files. Delivery uses authenticated
 * SMTP through PHP cURL. SMTP credentials must be provided by server or
 * environment configuration outside the public document root.
 *
 * Required environment values:
 *   JOVEL_SMTP_HOST
 *   JOVEL_SMTP_PORT
 *   JOVEL_SMTP_USER
 *   JOVEL_SMTP_PASS
 *
 * Optional:
 *   JOVEL_SMTP_FROM   defaults to the SMTP user when it is an email address
 *   JOVEL_PROJECT_TO  defaults to CONTACT_EMAIL
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

/* Simple bot controls. A filled honeypot or implausibly fast submission is
 * treated as success so automated senders are not told how they were caught. */
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

/* Reject unexpectedly large or link-heavy free text without storing it. */
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

$smtpHost = trim((string) getenv('JOVEL_SMTP_HOST'));
$smtpPort = (int) (getenv('JOVEL_SMTP_PORT') ?: 0);
$smtpUser = trim((string) getenv('JOVEL_SMTP_USER'));
$smtpPass = (string) getenv('JOVEL_SMTP_PASS');
$fromEnv  = trim((string) getenv('JOVEL_SMTP_FROM'));
$toEnv    = trim((string) getenv('JOVEL_PROJECT_TO'));

$from = filter_var($fromEnv, FILTER_VALIDATE_EMAIL)
    ? $fromEnv
    : (filter_var($smtpUser, FILTER_VALIDATE_EMAIL) ? $smtpUser : CONTACT_EMAIL);
$to = filter_var($toEnv, FILTER_VALIDATE_EMAIL) ? $toEnv : CONTACT_EMAIL;

if ($smtpHost === '' || $smtpPort <= 0 || $smtpUser === '' || $smtpPass === '' || !function_exists('curl_init')) {
    error_log('Jovel Creative project form: authenticated SMTP is not configured.');
    project_redirect('error');
}

$subject = 'New project inquiry from jovelcreative.com';
$headers = [
    'Date: ' . gmdate('D, d M Y H:i:s O'),
    'From: Jovel Creative <' . $from . '>',
    'To: Jovel Creative <' . $to . '>',
    'Reply-To: ' . $name . ' <' . $email . '>',
    'Subject: ' . $subject,
    'MIME-Version: 1.0',
    'Content-Type: text/plain; charset=UTF-8',
    'Content-Transfer-Encoding: 8bit',
];
$payload = implode("\r\n", $headers) . "\r\n\r\n" . $body . "\r\n";

$stream = fopen('php://temp', 'r+');
if ($stream === false) {
    project_redirect('error');
}
fwrite($stream, $payload);
rewind($stream);

$scheme = $smtpPort === 465 ? 'smtps' : 'smtp';
$curl = curl_init($scheme . '://' . $smtpHost . ':' . $smtpPort);
if ($curl === false) {
    fclose($stream);
    project_redirect('error');
}

$options = [
    CURLOPT_USERNAME       => $smtpUser,
    CURLOPT_PASSWORD       => $smtpPass,
    CURLOPT_MAIL_FROM      => '<' . $from . '>',
    CURLOPT_MAIL_RCPT      => ['<' . $to . '>'],
    CURLOPT_UPLOAD         => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 25,
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_SSL_VERIFYHOST => 2,
    CURLOPT_READFUNCTION   => static function ($ch, $fd, int $length) use ($stream): string {
        $data = fread($stream, $length);
        return $data === false ? '' : $data;
    },
];

if ($scheme === 'smtp') {
    $options[CURLOPT_USE_SSL] = CURLUSESSL_ALL;
}

curl_setopt_array($curl, $options);
$result = curl_exec($curl);
$curlError = curl_error($curl);
$curlCode = curl_errno($curl);
curl_close($curl);
fclose($stream);

if ($result === false || $curlCode !== 0) {
    error_log('Jovel Creative project form SMTP error: ' . $curlCode . ' ' . $curlError);
    project_redirect('error');
}

project_redirect('sent');
