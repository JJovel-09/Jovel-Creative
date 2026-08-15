<?php
/**
 * JOVEL CREATIVE, SERVICES
 *
 * First interior page on the shared PHP layout. Page owned metadata
 * is declared here, then the shared header, content, shared footer.
 */
require __DIR__ . '/includes/config.php';

$page_id     = 'services';
$title       = 'Services: Custom Trackers, Calculators, Proposals and Process Guides | Jovel Creative';
$description = 'Six kinds of custom business tools and documents: trackers and operational spreadsheets, calculators and planning tools, proposals and client documents, SOPs and process guides, document refresh, and connected business toolkits.';

/* Canonical comes from the page ID by way of the navigation registry,
   so this page cannot claim another page's canonical. */

$og_title       = 'What we build, and what each one is for';
$og_description = 'Six kinds of custom business tools and documents, built around how your business already runs.';

$schema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'WebPage',
    'name'        => 'Services',
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

  <!-- ============ INTERIOR HERO ============ -->
  <section class="page-hero">
    <div class="container">
      <span class="tag">Services</span>
      <h1>What we build, and what each one is for.</h1>
      <p class="page-hero-sub">Six kinds of custom tools and documents. Each one is built around your workflow, not a one-size-fits-all template. You do not need to know which one you need before you get in touch.</p>
    </div>
  </section>

  <!-- ============ THE SIX SERVICES ============ -->
  <section class="section" aria-labelledby="catalog-heading">
    <div class="container">
      <div class="section-head">
        <h2 id="catalog-heading">The six things we build</h2>
        <p>Start with the problem you are actually having. The right tool follows from there.</p>
      </div>

      <div class="service-list">

        <article class="service">
          <div class="service-lede">
            <span class="service-index" aria-hidden="true">01</span>
            <h3>Custom Trackers &amp; Operational Spreadsheets</h3>
            <span class="price-tag">Starting at $650</span>
          </div>
          <div class="service-detail">
            <p>One organized place for the information you are already keeping track of: customers, jobs, deposits, follow-ups, statuses and what happens next.</p>
            <p class="service-fit"><span class="service-fit-label">Good fit when</span> the same details live in three different places and nobody is certain which one is current.</p>
          </div>
        </article>

        <article class="service">
          <div class="service-lede">
            <span class="service-index" aria-hidden="true">02</span>
            <h3>Calculators &amp; Planning Tools</h3>
            <span class="price-tag">Starting at $650</span>
          </div>
          <div class="service-detail">
            <p>Pricing, estimating and planning tools that make the calculations you repeat consistent, practical and easier to use.</p>
            <p class="service-fit"><span class="service-fit-label">Good fit when</span> you work out the same kind of number often, and it does not come out the same way twice.</p>
          </div>
        </article>

        <article class="service">
          <div class="service-lede">
            <span class="service-index" aria-hidden="true">03</span>
            <h3>Proposals &amp; Client Documents</h3>
            <span class="price-tag">Starting at $375</span>
          </div>
          <div class="service-detail">
            <p>Clear, professional client-facing proposals and documents, built around how your business actually sells and delivers its work.</p>
            <p class="service-fit"><span class="service-fit-label">Good fit when</span> what you hand a client does not represent the standard of the work behind it.</p>
          </div>
        </article>

        <article class="service">
          <div class="service-lede">
            <span class="service-index" aria-hidden="true">04</span>
            <h3>SOPs &amp; Process Guides</h3>
            <span class="price-tag">Starting at $550</span>
          </div>
          <div class="service-detail">
            <p>Practical process documentation that turns important knowledge or repeated work into clear steps someone else can follow.</p>
            <p class="service-fit"><span class="service-fit-label">Good fit when</span> a process lives in one person's head, or gets done a little differently every time.</p>
          </div>
        </article>

        <article class="service">
          <div class="service-lede">
            <span class="service-index" aria-hidden="true">05</span>
            <h3>Document Refresh &amp; Redesign</h3>
            <span class="price-tag">Starting at $195</span>
          </div>
          <div class="service-detail">
            <p>An existing business document or spreadsheet redesigned for clarity, organization and usability.</p>
            <p class="service-fit"><span class="service-fit-label">Good fit when</span> what you have holds up, but it is hard to read, hard to move around in, or hard to hand to someone else.</p>
            <p class="service-note"><span class="service-fit-label">Scope note</span> A Refresh covers clarity, structure and usability. Repairing broken formulas, reworking business logic, redesigning a workflow, cleaning up or moving data, and adding new functionality are separate scope, quoted when they apply.</p>
          </div>
        </article>

        <article class="service">
          <div class="service-lede">
            <span class="service-index" aria-hidden="true">06</span>
            <h3>Business Toolkits &amp; Connected Systems</h3>
            <span class="price-tag">Starting at $1,500</span>
          </div>
          <div class="service-detail">
            <p>Several connected tools and documents, designed together to support a broader business workflow rather than a single task.</p>
            <p class="service-fit"><span class="service-fit-label">Good fit when</span> more than one part of the business needs to work from the same information.</p>
          </div>
        </article>

      </div>

      <p class="section-note">Which software each tool is built in is decided with you before the build begins, so it fits how your business already works.</p>

      <div class="reassure">
        <p>You do not need to know which of these you need.
          <small>Start with what is not working. Working out what to build, and which of these it turns out to be, is part of the service.</small>
        </p>
      </div>
    </div>
  </section>

  <!-- ============ FINAL CTA ============ -->
  <section class="final-cta" aria-labelledby="cta-heading">
    <div class="container">
      <h2 id="cta-heading">Start with the part that is costing you the most time.</h2>
      <p>Tell us what is not working. We will tell you what we would build and what it would take.</p>
      <div class="cta-row">
        <a class="btn btn-invert" href="/start-a-project">Start a Project</a>
      </div>
      <p class="final-contact">
        <span>Email: <a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a></span>
      </p>
    </div>
  </section>

<?php require __DIR__ . '/includes/footer.php'; ?>
