<?php
/**
 * JOVEL CREATIVE, SHARED SITE CONFIGURATION
 *
 * One small file of sitewide presentation values plus a few helpers.
 * Every public page requires this file first, then header.php, then
 * its own content, then footer.php.
 *
 * SECURITY BOUNDARY
 * This file holds presentation values only. No secrets belong here:
 * no SMTP passwords, no API keys, no tokens, no database credentials.
 * When the Start a Project form is built, its credentials must come
 * from server or environment configuration outside the public
 * document root, never from a file tracked in this repository.
 */

/* ---------- Direct request guard ----------
   The repository root is also the public document root, so this file
   is reachable by URL until Apache blocks it. A direct hit is answered
   with a 404 and nothing else. A normal require never trips this,
   because the requested script is the page, not this file. */
if (isset($_SERVER['SCRIPT_FILENAME'])
    && realpath($_SERVER['SCRIPT_FILENAME']) === realpath(__FILE__)) {
    http_response_code(404);
    exit;
}

/* Marks the configuration as loaded. The layout includes refuse to
   render unless they see this, which keeps them from being executed
   on their own and from being required out of order. */
define('JOVEL_SITE', true);

/* ---------- Identity ---------- */
const SITE_NAME    = 'Jovel Creative';
const SITE_URL     = 'https://jovelcreative.com';
const SITE_TAGLINE = 'Custom business tools';
const CONTACT_EMAIL = 'hello@jovelcreative.com';

/* Used as the meta description fallback only. Every real content page
   is expected to write its own. */
const SITE_DESCRIPTION = 'Custom spreadsheets, trackers, calculators, proposals and process guides, built around how your business actually works.';

/**
 * ---------- Navigation registry ----------
 * One shared structure, used by both the header navigation and the
 * footer links. The array key is the page ID, which is also how a page
 * declares itself and how the active state is resolved.
 *
 * The paths below are the intended final clean URLs. Clean URL routing
 * is a later phase, so several of these do not resolve yet.
 */
const SITE_NAV = [
    'services'        => ['label' => 'Services',        'path' => '/services'],
    'examples'        => ['label' => 'Examples',        'path' => '/examples'],
    'pricing'         => ['label' => 'Pricing',         'path' => '/pricing'],
    'about'           => ['label' => 'About',           'path' => '/about'],
    'faq'             => ['label' => 'FAQ',             'path' => '/faq'],
    'start-a-project' => ['label' => 'Start a Project', 'path' => '/start-a-project', 'cta' => true],
];

/**
 * Escape a value for safe output in HTML.
 */
function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * Build an absolute URL from a site relative path.
 * Paths are stored as paths and joined with SITE_URL here, so the
 * domain is never hand written on an individual page.
 */
function site_url(string $path = '/'): string
{
    return rtrim(SITE_URL, '/') . '/' . ltrim($path, '/');
}

/**
 * Resolve the canonical path for a page.
 *
 * The page ID wins whenever it is a known section. That is deliberate:
 * a page declares one trusted ID, and its canonical is derived from it,
 * so one page cannot quietly claim another page's canonical by copying
 * a header block. The explicit argument is the fallback for pages that
 * sit outside the navigation registry, such as legal pages.
 */
function canonical_path(string $page_id, ?string $explicit = null): string
{
    if (isset(SITE_NAV[$page_id]['path'])) {
        return SITE_NAV[$page_id]['path'];
    }

    return $explicit ?? '/';
}
