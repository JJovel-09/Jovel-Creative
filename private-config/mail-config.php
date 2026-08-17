<?php
declare(strict_types=1);

/*
 * Secret-free SMTP configuration loader.
 *
 * The real mailbox credential lives outside the web root and outside Git at:
 *   ~/.config/jovelcreative/mail-config.php
 *
 * This tracked loader may be deployed safely. The private-config directory is
 * also denied over HTTP by both the root and local .htaccess rules.
 */

$home = getenv('HOME');
if (!is_string($home) || $home === '') {
    $home = '';
    if (preg_match('#^(/home/[^/]+)(?:/|$)#', __DIR__, $matches) === 1) {
        $home = $matches[1];
    }
}

if ($home === '') {
    return [];
}

$secretPath = rtrim($home, DIRECTORY_SEPARATOR)
    . DIRECTORY_SEPARATOR . '.config'
    . DIRECTORY_SEPARATOR . 'jovelcreative'
    . DIRECTORY_SEPARATOR . 'mail-config.php';

if (!is_readable($secretPath)) {
    return [];
}

$config = require $secretPath;
return is_array($config) ? $config : [];
