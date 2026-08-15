<?php
require __DIR__ . '/includes/config.php';

$page_id     = 'pricing';
$title       = 'Pricing for Custom Business Tools and Documents | Jovel Creative';
$description = 'Starting prices for custom spreadsheets, calculators, proposals, SOPs, document refreshes and connected business toolkits from Jovel Creative. Every project is quoted at a fixed price before work begins.';
$extra_stylesheet = '/css/pricing.css';

$og_title       = 'Clear starting prices. Fixed quotes before the build.';
$og_description = 'See Jovel Creative starting prices and how a fixed project quote is determined.';

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
      <h1>Know the starting point before you start the conversation.</h1>
      <p class="page-hero-sub">Every project is scoped around the work you actually need and quoted at a fixed price before the build begins. These starting prices show where a standard project begins.</p>
      <div class="pricing-hero-note"><strong>No hourly billing surprises.</strong><span>You see the scope, deliverables and fixed price before you approve the project.</span></div>
    </div>
  </section>

  <section class="section" aria-labelledby="starting-prices-heading">
    <div class="container">
      <div class="section-head">
        <h2 id="starting-prices-heading">Starting prices</h2>
        <p>The final quote depends on the condition of the information you already have, what the tool needs to do and how many deliverables are involved.</p>
      </div>

      <div class="pricing-list">
        <article class="pricing-row"><div class="pricing-service"><span class="pricing-index">01</span><div><h3>Custom Trackers &amp; Operational Spreadsheets</h3><p>Organize customers, jobs, statuses, follow-ups, deposits or other information your business needs to manage repeatedly.</p></div></div><div class="pricing-amount"><small>Starting at</small><strong>$650</strong></div></article>
        <article class="pricing-row"><div class="pricing-service"><span class="pricing-index">02</span><div><h3>Calculators &amp; Planning Tools</h3><p>Turn repeated pricing, estimating or planning calculations into a consistent tool built around your rules.</p></div></div><div class="pricing-amount"><small>Starting at</small><strong>$650</strong></div></article>
        <article class="pricing-row"><div class="pricing-service"><span class="pricing-index">03</span><div><h3>Proposals &amp; Client Documents</h3><p>Clear, professional documents structured around how your business presents, prices and delivers its work.</p></div></div><div class="pricing-amount"><small>Starting at</small><strong>$375</strong></div></article>
        <article class="pricing-row"><div class="pricing-service"><span class="pricing-index">04</span><div><h3>SOPs &amp; Process Guides</h3><p>Turn an important process, repeated task or subject-matter knowledge into steps someone else can actually follow.</p></div></div><div class="pricing-amount"><small>Starting at</small><strong>$550</strong></div></article>
        <article class="pricing-row"><div class="pricing-service"><span class="pricing-index">05</span><div><h3>Document Refresh &amp; Redesign</h3><p>Improve the clarity, organization and usability of an existing business document or spreadsheet without rebuilding its core workflow.</p></div></div><div class="pricing-amount"><small>Starting at</small><strong>$195</strong></div></article>
        <article class="pricing-row pricing-row-featured"><div class="pricing-service"><span class="pricing-index">06</span><div><h3>Business Toolkits &amp; Connected Systems</h3><p>Several connected tools and documents designed together around a broader business workflow.</p></div></div><div class="pricing-amount"><small>Starting at</small><strong>$1,500</strong></div></article>
      </div>
      <p class="pricing-footnote">Starting prices are for a defined standard scope. Data cleanup or migration, additional deliverables, complex business logic, new requirements and specialized functionality are quoted when they apply.</p>
    </div>
  </section>

  <section class="section pricing-quote-section" aria-labelledby="quote-heading">
    <div class="container">
      <div class="section-head">
        <span class="tag">How the fixed quote is set</span>
        <h2 id="quote-heading">The price follows the work, not a package label.</h2>
        <p>Before quoting, we look at enough of the real project to understand what has to be structured, built and tested.</p>
      </div>
      <div class="quote-factors">
        <article><span>01</span><h3>What you are starting with</h3><p>Clean source material takes less restructuring than scattered files, incomplete information or a process that still has to be mapped.</p></article>
        <article><span>02</span><h3>What the tool needs to do</h3><p>A straightforward tracker is different from a tool with formulas, business rules, connected records or multiple outputs.</p></article>
        <article><span>03</span><h3>What has to be delivered</h3><p>One finished tool is different from several connected files, client-facing documents or multiple versions.</p></article>
        <article><span>04</span><h3>What has to be tested</h3><p>More calculations, edge cases, data movement and workflow dependencies require more validation before delivery.</p></article>
      </div>
      <div class="file-review-callout"><div><strong>For custom work, we may need to review the files first.</strong><p>You do not upload sensitive working files through the public website. If the project looks like a fit, we arrange the appropriate file review before the fixed quote when needed.</p></div></div>
    </div>
  </section>

  <section class="section" aria-labelledby="included-heading">
    <div class="container">
      <div class="pricing-two-col">
        <div>
          <span class="tag">Included in the project</span>
          <h2 id="included-heading">The quote covers more than file production.</h2>
        </div>
        <ul class="pricing-included">
          <li><strong>Defined scope before the build.</strong><span>What the project covers and does not cover is documented before work begins.</span></li>
          <li><strong>Platform agreed up front.</strong><span>Excel, Google Sheets, Word or another agreed platform is selected before the build.</span></li>
          <li><strong>Human-reviewed delivery.</strong><span>Structure, functionality, presentation and factual consistency are reviewed before final delivery.</span></li>
          <li><strong>Revision allowance stated in the quote.</strong><span>You know how review and revisions work before the project starts.</span></li>
          <li><strong>Editable ownership after full payment.</strong><span>You receive the customized final deliverables for your business to keep and use.</span></li>
        </ul>
      </div>
    </div>
  </section>

  <section class="section payment-section" aria-labelledby="payment-heading">
    <div class="container">
      <div class="section-head">
        <span class="tag">Payment timing</span>
        <h2 id="payment-heading">Payment is tied to project size.</h2>
        <p>The payment schedule is stated in the quote and agreement before work begins.</p>
      </div>
      <div class="payment-grid">
        <article><small>Projects under $500</small><strong>100% upfront</strong><p>Payment confirms the project and reserves the build.</p></article>
        <article><small>$500 to $1,499</small><strong>50% / 50%</strong><p>Half to begin. The remaining half is due before final delivery.</p></article>
        <article><small>$1,500 and above</small><strong>40% / 30% / 30%</strong><p>Initial payment, an agreed project milestone, then the final payment before delivery.</p></article>
      </div>
    </div>
  </section>

  <section class="section" aria-labelledby="scope-heading">
    <div class="container">
      <div class="pricing-scope">
        <div><span class="tag">If the scope changes</span><h2 id="scope-heading">No silent expansion of the bill.</h2></div>
        <div><p>If a new requirement changes the functionality, workflow, deliverables, data work or project complexity, we identify it before doing the additional work.</p><p>We either keep the original scope, reduce the scope to fit the original budget, or price the added work clearly. We reduce scope before discounting the work itself.</p></div>
      </div>
    </div>
  </section>

  <section class="final-cta" aria-labelledby="pricing-cta-heading">
    <div class="container">
      <h2 id="pricing-cta-heading">You do not need to know what kind of tool you need.</h2>
      <p>Tell us what is taking too long, what keeps getting rebuilt or what information is hard to manage. Figuring out what to build is part of the service.</p>
      <div class="cta-row"><a class="btn btn-invert" href="/start-a-project">Start a Project</a><a class="btn btn-invert-outline" href="/examples">See an Example</a></div>
    </div>
  </section>

<?php require __DIR__ . '/includes/footer.php'; ?>
