<?php
require __DIR__ . '/includes/config.php';

http_response_code(404);

$page_id     = 'not-found';
$title       = 'Page Not Found | Jovel Creative';
$description = 'The page you requested could not be found. Explore Jovel Creative services, examples and project information.';
$canonical   = '/404';
$robots      = 'noindex, follow';
$og_title    = 'Page Not Found | Jovel Creative';
$og_description = 'The page you requested could not be found. Use the links below to continue exploring Jovel Creative.';

require __DIR__ . '/includes/header.php';
?>

  <section class="page-hero">
    <div class="container">
      <span class="tag">404 / Page not found</span>
      <h1>That page is not here.</h1>
      <p class="page-hero-sub">The link may be outdated or the address may have changed. The rest of Jovel Creative is still available.</p>
      <div class="cta-row">
        <a class="btn btn-primary" href="/">Go to Homepage</a>
        <a class="btn btn-secondary" href="/examples">See Examples</a>
      </div>
    </div>
  </section>

  <section class="section" aria-labelledby="not-found-next">
    <div class="container">
      <div class="section-head">
        <span class="tag">Keep going</span>
        <h2 id="not-found-next">Looking for something specific?</h2>
        <p>These are the most useful places to continue.</p>
      </div>
      <div class="section-cta">
        <a class="btn btn-secondary" href="/services">Services</a>
        <a class="btn btn-secondary" href="/pricing">Pricing</a>
        <a class="btn btn-secondary" href="/faq">FAQ</a>
        <a class="btn btn-primary" href="/start-a-project">Start a Project</a>
      </div>
    </div>
  </section>

<?php require __DIR__ . '/includes/footer.php'; ?>
