<?php
require __DIR__ . '/includes/config.php';

$page_id     = 'pricing';
$title       = 'Pricing for Custom Business Tools and Documents | Jovel Creative';
$description = 'Starting prices for custom spreadsheets, calculators, proposals, SOPs, document refreshes and connected business toolkits from Jovel Creative. Every project is quoted at a fixed price before work begins.';
$extra_stylesheet = '/css/pricing.css';

$og_title       = 'Clear starting prices. Fixed quotes before the build.';
$og_description = 'See Jovel Creative starting prices and what affects a custom project quote.';

$schema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'WebPage',
    'name'        => 'Pricing',
    'description' => $description,
    'url'         => site_url(canonical_path($page_id)),
    'publisher'   => [
        '@type' => 'Organization',
        'name'  => SITE_NAME,
        'url'   => site_url('/'),
        'email' => CONTACT_EMAIL,
    ],
];

require __DIR__ . '/includes/header.php';
?>

  <section class="page-hero pricing-hero">
    <div class="container">
      <span class="tag">Pricing</span>
      <h1>Clear starting prices. A fixed quote before we build.</h1>
      <p class="page-hero-sub">Custom work varies, but you should know where it starts. We scope the project first, then give you one price for the agreed work.</p>
      <div class="pricing-hero-note">
        <strong>No hourly billing surprises.</strong>
        <span>If the scope changes, we talk about it before additional work begins.</span>
      </div>
    </div>
  </section>

  <section class="section" aria-labelledby="starting-prices-heading">
    <div class="container">
      <div class="section-head pricing-section-head">
        <h2 id="starting-prices-heading">Starting prices</h2>
        <p>Standard projects begin here.</p>
      </div>

      <div class="pricing-list">
        <article class="pricing-row">
          <div class="pricing-service"><span class="pricing-index">01</span><div><h3>Custom Trackers &amp; Operational Spreadsheets</h3><p>Keep customers, jobs, statuses, deposits and follow-ups in one usable place.</p></div></div>
          <div class="pricing-amount"><small>Starting at</small><strong>$650</strong></div>
        </article>
        <article class="pricing-row">
          <div class="pricing-service"><span class="pricing-index">02</span><div><h3>Calculators &amp; Planning Tools</h3><p>Make repeated pricing, estimating or planning calculations consistent.</p></div></div>
          <div class="pricing-amount"><small>Starting at</small><strong>$650</strong></div>
        </article>
        <article class="pricing-row">
          <div class="pricing-service"><span class="pricing-index">03</span><div><h3>Proposals &amp; Client Documents</h3><p>Professional client-facing documents built around how you sell and deliver your work.</p></div></div>
          <div class="pricing-amount"><small>Starting at</small><strong>$375</strong></div>
        </article>
        <article class="pricing-row">
          <div class="pricing-service"><span class="pricing-index">04</span><div><h3>SOPs &amp; Process Guides</h3><p>Turn an important process into clear steps someone else can follow.</p></div></div>
          <div class="pricing-amount"><small>Starting at</small><strong>$550</strong></div>
        </article>
        <article class="pricing-row">
          <div class="pricing-service"><span class="pricing-index">05</span><div><h3>Document Refresh &amp; Redesign</h3><p>Make an existing document or spreadsheet clearer and easier to use.</p></div></div>
          <div class="pricing-amount"><small>Starting at</small><strong>$195</strong></div>
        </article>
        <article class="pricing-row pricing-row-featured">
          <div class="pricing-service"><span class="pricing-index">06</span><div><h3>Business Toolkits &amp; Connected Systems</h3><p>Connect several tools and documents around one broader business workflow.</p></div></div>
          <div class="pricing-amount"><small>Starting at</small><strong>$1,500</strong></div>
        </article>
      </div>
      <p class="pricing-footnote">Starting prices assume a defined standard scope. Complex logic, data cleanup or migration, and additional deliverables are quoted separately when they apply.</p>
    </div>
  </section>

  <section class="section pricing-included-section" aria-labelledby="included-heading">
    <div class="container">
      <div class="pricing-two-col">
        <div>
          <span class="tag">What is included</span>
          <h2 id="included-heading">More than a finished file.</h2>
        </div>
        <ul class="pricing-included">
          <li><strong>Defined scope and fixed price</strong><span>before the build begins.</span></li>
          <li><strong>Agreed platform</strong><span>selected before we build.</span></li>
          <li><strong>Human-reviewed final deliverables</strong><span>checked for function, clarity and consistency.</span></li>
          <li><strong>Revision allowance</strong><span>stated in your quote.</span></li>
          <li><strong>Editable final files</strong><span>for your business after full payment.</span></li>
        </ul>
      </div>
    </div>
  </section>

  <section class="section pricing-quote-section" aria-labelledby="quote-heading">
    <div class="container">
      <div class="section-head pricing-section-head">
        <span class="tag">Why the final quote may vary</span>
        <h2 id="quote-heading">The price follows the work.</h2>
      </div>
      <div class="quote-factors quote-factors-compact">
        <article><span>01</span><h3>Your starting point</h3><p>Clean, organized source material takes less restructuring than scattered or incomplete information.</p></article>
        <article><span>02</span><h3>What the tool needs to do</h3><p>Formulas, business rules, connected records and specialized functionality add complexity.</p></article>
        <article><span>03</span><h3>What we need to deliver and test</h3><p>More outputs, edge cases and dependencies require more build and QA time.</p></article>
      </div>
      <p class="file-review-note"><strong>Some custom projects require a private file review before we quote.</strong> Sensitive working files are not uploaded through the public website.</p>
    </div>
  </section>

  <section class="pricing-promises" aria-label="Before work begins">
    <div class="container pricing-promises-grid">
      <div><strong>Fixed price approved</strong><span>before the build.</span></div>
      <div><strong>Payment terms provided</strong><span>with your quote and agreement.</span></div>
      <div><strong>Scope changes discussed first</strong><span>before additional work is done.</span></div>
    </div>
  </section>

  <section class="final-cta" aria-labelledby="pricing-cta-heading">
    <div class="container">
      <h2 id="pricing-cta-heading">You do not need to know what kind of tool you need.</h2>
      <p>Tell us what is taking too long, what keeps getting rebuilt or what information is hard to manage. Figuring out what to build is part of the service.</p>
      <div class="cta-row">
        <a class="btn btn-invert" href="/start-a-project">Start a Project</a>
        <a class="btn btn-invert-outline" href="/examples">See an Example</a>
      </div>
    </div>
  </section>

<?php require __DIR__ . '/includes/footer.php'; ?>
