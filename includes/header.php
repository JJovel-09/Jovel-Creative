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
 *   $page_id         required, the trusted identity of the page
 *   $title           full <title> text
 *   $description     meta description
 *   $canonical       canonical path, only for pages outside SITE_NAV
 *   $og_title        defaults to $title
 *   $og_description  defaults to $description
 *   $schema          optional PHP array, emitted as JSON-LD
 *
 * Every real public content page is expected to set at least
 * $page_id, $title and $description.
 */

/* ---------- Direct request guard ----------
   Reached only if this file is requested over HTTP on its own, in
   which case the configuration was never loaded. Nothing renders,
   so no partial page and no implementation detail is exposed.
   Defense in depth alongside the root .htaccess rule. */
if (!defined('JOVEL_SITE')) {
    http_response_code(404);
    exit;
}

$page_id        = isset($page_id) ? (string) $page_id : '';
$title          = isset($title) && $title !== '' ? (string) $title : SITE_NAME;
$description    = isset($description) && $description !== '' ? (string) $description : SITE_DESCRIPTION;
$canonical_url  = site_url(canonical_path($page_id, $canonical ?? null));
$og_title       = isset($og_title) && $og_title !== '' ? (string) $og_title : $title;
$og_description = isset($og_description) && $og_description !== '' ? (string) $og_description : $description;

/* The body class comes from the trusted page ID, never from the
   request, so scoped interior styles cannot be triggered by a URL. */
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
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="<?= e($canonical_url) ?>">

  <meta property="og:type" content="website">
  <meta property="og:url" content="<?= e($canonical_url) ?>">
  <meta property="og:title" content="<?= e($og_title) ?>">
  <meta property="og:description" content="<?= e($og_description) ?>">
  <meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
  <meta property="og:locale" content="en_US">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= e($og_title) ?>">
  <meta name="twitter:description" content="<?= e($og_description) ?>">

  <link rel="icon" type="image/x-icon" href="/favicon.ico">

  <link rel="stylesheet" href="/css/jovel.css">
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
          $is_current = ($nav_id === $page_id); ?>
        <li><a<?= !empty($item['cta']) ? ' class="nav-cta"' : '' ?> href="<?= e($item['path']) ?>"<?= $is_current ? ' aria-current="page"' : '' ?>><?= e($item['label']) ?></a></li>
<?php endforeach; ?>
      </ul>
    </nav>
  </div>
</header>

<main id="main">
