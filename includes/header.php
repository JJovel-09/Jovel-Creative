<?php
/**
 * JOVEL CREATIVE, SHARED PAGE HEAD AND SITE HEADER
 *
 * Owns the document from <!DOCTYPE html> through the opening <main>.
 * Requires includes/config.php to have been loaded first.
 *
 * A page sets its own metadata in plain variables before requiring
 * this file. Everything except the page ID has a sensible fallback:
 *
 *   $page_id          required, the trusted identity of the page
 *   $nav_parent       optional, marks a parent navigation item current
 *   $title            full <title> text
 *   $description      meta description
 *   $canonical        canonical path, only for pages outside SITE_NAV
 *   $robots           defaults to index, follow
 *   $og_title         defaults to $title
 *   $og_description   defaults to $description
 *   $og_image         defaults to the shared Jovel Creative social card
 *   $og_image_alt     defaults to the core positioning line
 *   $extra_stylesheet optional site-relative stylesheet for page families
 *   $schema           optional PHP array, emitted as JSON-LD
 *
 * Every real public content page is expected to set at least
 * $page_id, $title and $description.
 */

/* ---------- Direct request guard ---------- */
if (!defined('JOVEL_SITE')) {
    http_response_code(404);
    exit;
}

$page_id        = isset($page_id) ? (string) $page_id : '';
$nav_current_id = isset($nav_parent) && $nav_parent !== '' ? (string) $nav_parent : $page_id;
$title          = isset($title) && $title !== '' ? (string) $title : SITE_NAME;
$description    = isset($description) && $description !== '' ? (string) $description : SITE_DESCRIPTION;
$canonical_url  = site_url(canonical_path($page_id, $canonical ?? null));
$robots         = isset($robots) && $robots !== '' ? (string) $robots : 'index, follow';
$og_title       = isset($og_title) && $og_title !== '' ? (string) $og_title : $title;
$og_description = isset($og_description) && $og_description !== '' ? (string) $og_description : $description;
$og_image       = isset($og_image) && $og_image !== '' ? (string) $og_image : '/images/jovel-creative-social-card.png';
$og_image_url   = preg_match('~^https?://~i', $og_image) ? $og_image : site_url($og_image);
$og_image_alt   = isset($og_image_alt) && $og_image_alt !== ''
    ? (string) $og_image_alt
    : 'Jovel Creative. You have the information. We build the tool.';
$extra_stylesheet = isset($extra_stylesheet) && $extra_stylesheet !== '' ? (string) $extra_stylesheet : '';

/* The body class comes from the trusted page ID, never from the request. */
$body_class = $page_id !== '' ? 'page-' . preg_replace('/[^a-z0-9-]/', '', strtolower($page_id)) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?= e($title) ?></title>
  <meta name="description" content="<?= e($description) ?>">
  <meta name="author" content="Juan Jovel, <?= e(SITE_NAME) ?>">
  <meta name="robots" content="<?= e($robots) ?>">
  <link rel="canonical" href="<?= e($canonical_url) ?>">

  <meta property="og:type" content="website">
  <meta property="og:url" content="<?= e($canonical_url) ?>">
  <meta property="og:title" content="<?= e($og_title) ?>">
  <meta property="og:description" content="<?= e($og_description) ?>">
  <meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
  <meta property="og:locale" content="en_US">
  <meta property="og:image" content="<?= e($og_image_url) ?>">
  <meta property="og:image:secure_url" content="<?= e($og_image_url) ?>">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:alt" content="<?= e($og_image_alt) ?>">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= e($og_title) ?>">
  <meta name="twitter:description" content="<?= e($og_description) ?>">
  <meta name="twitter:image" content="<?= e($og_image_url) ?>">
  <meta name="twitter:image:alt" content="<?= e($og_image_alt) ?>">

  <link rel="icon" type="image/x-icon" href="/favicon.ico">

  <link rel="stylesheet" href="/css/jovel.css">
<?php if ($extra_stylesheet !== ''): ?>
  <link rel="stylesheet" href="<?= e($extra_stylesheet) ?>">
<?php endif; ?>
<?php if (!empty($schema) && is_array($schema)): ?>

  <script type="application/ld+json">
<?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_PRETTY_PRINT) ?>

  </script>
<?php endif; ?>
</head>
<body<?= $body_class !== '' ? ' class="' . e($body_class) . '"' : '' ?>>
<a class="skip-link" href="#main">Skip to content</a>

<header class="site-header">
  <div class="container header-inner">
    <a class="wordmark" href="/"><strong><?= e(SITE_NAME) ?></strong><small><?= e(SITE_TAGLINE) ?></small></a>
    <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav">Menu</button>
    <nav class="site-nav" id="site-nav" aria-label="Main">
      <ul>
<?php foreach (SITE_NAV as $nav_id => $item):
          $is_current = ($nav_id === $nav_current_id); ?>
        <li><a<?= !empty($item['cta']) ? ' class="nav-cta"' : '' ?> href="<?= e($item['path']) ?>"<?= $is_current ? ' aria-current="page"' : '' ?>><?= e($item['label']) ?></a></li>
<?php endforeach; ?>
      </ul>
    </nav>
  </div>
</header>

<main id="main">
