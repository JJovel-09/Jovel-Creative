<?php
require __DIR__ . '/includes/config.php';

$page_id     = 'ays-hospitality-case-study';
$nav_parent  = 'examples';
$canonical   = '/ays-hospitality-operations-system';
$title       = 'AYS Hospitality Operations System Case Study | Jovel Creative';
$description = 'See how Jovel Creative organized catering clients, jobs, pricing, proposals, invoices and payments into a custom Excel and Word operations system for AYS Hospitality.';
$extra_stylesheet = '/css/case-studies.css';

$og_title       = 'AYS Hospitality Client & Event Operations System';
$og_description = 'A real business project showing how scattered catering information became one practical Excel and Word workflow.';

$schema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'WebPage',
    'name'        => 'AYS Hospitality Client & Event Operations System',
    'description' => $description,
    'url'         => site_url($canonical),
    'isPartOf'    => [
        '@type' => 'CollectionPage',
        'name'  => 'Examples',
        'url'   => site_url('/examples'),
    ],
    'publisher'   => [
        '@type' => 'Organization',
        'name'  => SITE_NAME,
        'url'   => site_url('/'),
    ],
];

require __DIR__ . '/includes/header.php';
?>

  <section class="case-hero">
    <div class="container">
      <nav class="case-breadcrumb" aria-label="Breadcrumb"><a href="/examples">Examples</a><span aria-hidden="true">/</span><span>AYS Hospitality</span></nav>
      <div class="case-hero-copy">
        <span class="tag">Real Business Project / Catering &amp; Hospitality</span>
        <h1>AYS Hospitality Client &amp; Event Operations System</h1>
        <p>Scattered client details, pricing, proposals, invoices and payment information turned into one practical Excel and Word operating system.</p>
        <div class="case-meta" aria-label="Project details"><span>Microsoft Excel + Word</span><span>Operations system</span><span>Client-facing documents</span></div>
      </div>
      <figure class="case-hero-artifact">
        <img src="/images/examples/ays-hospitality/dashboard.svg" alt="Sanitized preview of the AYS Hospitality operations dashboard showing active jobs, upcoming work, outstanding invoiced amounts and workflow steps." width="1600" height="650">
        <figcaption>Operational dashboard. Sanitized demonstration data is used throughout this case study.</figcaption>
      </figure>
    </div>
  </section>

  <section class="case-impact" aria-labelledby="impact-heading">
    <div class="container">
      <div class="case-impact-head"><span class="tag">Estimated operational impact</span><h2 id="impact-heading">Less rebuilding. More usable information.</h2></div>
      <div class="impact-grid">
        <article><strong>1 to 2 hours</strong><span>Estimated administrative time saved on a typical catering job.</span></article>
        <article><strong>3+ hours</strong><span>Potential savings on more complex engagements with proposals, agreements, invoices and payment tracking.</span></article>
        <article><strong>One record</strong><span>Client, job, pricing, invoice and payment information connected around the same workflow.</span></article>
        <article><strong>Fewer manual steps</strong><span>Repeated calculations and duplicate data entry replaced with standardized formulas and structured records.</span></article>
      </div>
      <p class="impact-note">Estimates reflect the workflow the system was designed to replace. Actual time savings vary by job complexity and user.</p>
    </div>
  </section>

  <section class="section" aria-labelledby="situation-heading">
    <div class="container">
      <div class="case-split">
        <article><span class="tag">The situation</span><h2 id="situation-heading">One business, very different kinds of catering work.</h2><p>AYS Hospitality manages one-time catered events as well as recurring meal-service engagements. A large event can involve hundreds of guests, multiple menu components, staffing, equipment and event-specific pricing. A recurring engagement may serve the same client every week.</p><p>Both still rely on the same core information: client details, service requirements, pricing, deposits, proposals, invoices and payments.</p></article>
        <article><span class="tag">The problem</span><h2>The information existed. The structure did not.</h2><p>As a job moved forward, the same details could appear in multiple files. Pricing from a proposal was needed again for an invoice. Client information had to be copied into another document. Payment status lived separately from the original quote.</p><p>There was no single place to answer what had been quoted, what had been invoiced, what had been paid and what still needed attention.</p></article>
      </div>
      <div class="case-flow" aria-label="Before and after workflow">
        <div><span class="case-flow-label">Before</span><strong>Separate business documents</strong><small>Client details, pricing, proposals, invoices and payment information repeated across files.</small></div>
        <span class="case-flow-arrow" aria-hidden="true">→</span>
        <div><span class="case-flow-label">Jovel Creative</span><strong>One connected workflow</strong><small>Client → Job or Service → Pricing → Proposal → Agreement → Invoice → Payment → Closeout</small></div>
        <span class="case-flow-arrow" aria-hidden="true">→</span>
        <div class="is-result"><span class="case-flow-label">After</span><strong>Usable operational visibility</strong><small>One structure for what was quoted, invoiced, paid, outstanding and next.</small></div>
      </div>
    </div>
  </section>

  <section class="section" aria-labelledby="build-heading">
    <div class="container">
      <div class="section-head"><span class="tag">What Jovel Creative built</span><h2 id="build-heading">A custom Client &amp; Event Operations System.</h2><p>The Excel workbook became the operational hub, with Word handling the client-facing proposal and agreement layer.</p></div>
      <div class="case-build-grid">
        <article><h3>Dashboard</h3><p>Active jobs, upcoming work, outstanding invoiced amounts, overdue invoices and items requiring attention.</p></article>
        <article><h3>Clients</h3><p>Centralized organizations, contacts, billing information and payment preferences.</p></article>
        <article><h3>Jobs &amp; Services</h3><p>One-time events and recurring engagements tracked without forcing them into the same structure.</p></article>
        <article><h3>Pricing</h3><p>Food, staffing, delivery, equipment, flat fees, included items, service charges and tax connected to each job.</p></article>
        <article><h3>Invoices &amp; Payments</h3><p>One or multiple invoices per job, with payment status and balances tracked without storing sensitive card data.</p></article>
        <article><h3>Job Summary</h3><p>A quick operational view of the client, job, document status and financial position.</p></article>
      </div>
      <figure class="case-artifact case-artifact-wide"><img src="/images/examples/ays-hospitality/job-summary.svg" alt="Sanitized Job Summary preview showing Oakridge Community Center, an annual community dinner, quoted total, payment status and document status." width="1600" height="390"><figcaption><strong>One job, one operational view.</strong> Client details, document status and financial information stay connected throughout the engagement.</figcaption></figure>
    </div>
  </section>

  <section class="section" aria-labelledby="output-heading">
    <div class="container">
      <div class="section-head"><span class="tag">From internal record to client-ready output</span><h2 id="output-heading">The tool does not stop at tracking.</h2><p>Information already stored in the system can support the documents the business needs to send and use.</p></div>
      <div class="artifact-pair">
        <figure class="case-artifact"><img src="/images/examples/ays-hospitality/invoice.svg" alt="Sanitized client-facing AYS Hospitality invoice showing a partial payment and remaining balance due." width="900" height="1120"><figcaption><strong>Client-ready invoice.</strong> Client, job and financial information is already organized when it is time to prepare the invoice.</figcaption></figure>
        <figure class="case-artifact"><img src="/images/examples/ays-hospitality/proposal.svg" alt="Sanitized AYS Hospitality catering proposal preview showing an event overview and menu and services table for a community dinner." width="900" height="1160"><figcaption><strong>Standardized proposal.</strong> Reusable Word documents create a consistent structure while each engagement keeps its own details, pricing and terms.</figcaption></figure>
      </div>
      <p class="privacy-note">Project previews use sanitized demonstration data to protect business and customer information.</p>
    </div>
  </section>

  <section class="section" aria-labelledby="why-heading">
    <div class="container">
      <div class="case-split case-split-result">
        <article><span class="tag">Why it works</span><h2 id="why-heading">Enough structure without unnecessary software.</h2><p>The goal was not to automate everything. It was to eliminate repetition while keeping the system simple enough for the business to maintain.</p><ul class="case-checks"><li>No complicated CRM implementation.</li><li>No customer portal required.</li><li>No macros or custom application to maintain.</li><li>No monthly software subscription required for the core system.</li><li>Editable Excel and Word files remain under the business's control.</li></ul></article>
        <article><span class="tag">The result</span><h2>Separate files became one operational structure.</h2><p>AYS Hospitality now has a system designed to connect who the client is, what the business is providing, what was quoted, what has been invoiced, what has been paid and what is still outstanding.</p><p>The file is the deliverable. The value is the structure behind it.</p></article>
      </div>
    </div>
  </section>

  <section class="final-cta" aria-labelledby="case-cta-heading">
    <div class="container"><h2 id="case-cta-heading">Your business does not need to fit a template.</h2><p>Tell us what you are keeping track of, what keeps getting rebuilt and what is not working. Figuring out what to build is part of the service.</p><div class="cta-row"><a class="btn btn-invert" href="/start-a-project">Start a Project</a><a class="btn btn-invert-outline" href="/examples">See More Examples</a></div></div>
  </section>

<?php require __DIR__ . '/includes/footer.php'; ?>
