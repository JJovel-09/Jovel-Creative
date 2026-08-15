<?php
require __DIR__ . '/includes/config.php';

$page_id     = 'examples';
$title       = 'Examples: Custom Business Tools Built Around Real Workflows | Jovel Creative';
$description = 'See how Jovel Creative turns scattered business information into practical spreadsheets, documents and connected tools built around how a business actually works.';
$extra_stylesheet = '/css/case-studies.css';

$og_title       = 'Examples of custom business tools from Jovel Creative';
$og_description = 'Real business problems, practical custom tools, and clear explanations of what was built and why.';

$schema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'CollectionPage',
    'name'        => 'Examples',
    'description' => $description,
    'url'         => site_url(canonical_path($page_id)),
    'publisher'   => [
        '@type' => 'Organization',
        'name'  => SITE_NAME,
        'url'   => site_url('/'),
    ],
];

require __DIR__ . '/includes/header.php';
?>

  <section class="page-hero">
    <div class="container">
      <span class="tag">Examples</span>
      <h1>See the problem, the build and the result.</h1>
      <p class="page-hero-sub">Our examples show what Jovel Creative actually builds, why the business needed it and how the finished tool organizes the work.</p>
    </div>
  </section>

  <section class="section" aria-labelledby="featured-project-heading">
    <div class="container">
      <div class="section-head">
        <h2 id="featured-project-heading">Featured project</h2>
        <p>A real business workflow, rebuilt around the information the business was already using.</p>
      </div>

      <article class="project-card">
        <div class="project-card-copy">
          <span class="tag">Real Business Project / Catering &amp; Hospitality</span>
          <h3>AYS Hospitality Client &amp; Event Operations System</h3>
          <p>Client information, pricing, proposals, invoices and payments were spread across separate documents. Jovel Creative turned that information into a connected Excel and Word operations system built around the business's actual workflow.</p>
          <div class="project-impact-line">
            <strong>Estimated impact</strong>
            <span>1 to 2 hours of administrative time saved on a typical catering job, with 3+ hours possible on more complex engagements.</span>
          </div>
          <p class="project-built"><strong>Built:</strong> Client and job tracking, pricing system, dashboard, invoice and payment tracking, client-facing invoice, proposal templates and recurring-service tools.</p>
          <a class="btn btn-primary" href="/ays-hospitality-operations-system">View Project</a>
        </div>
        <figure class="project-card-visual">
          <img src="/images/examples/ays-hospitality/dashboard.svg" alt="Sanitized preview of the AYS Hospitality operations dashboard showing active jobs, upcoming work, invoiced balances and workflow steps." width="1600" height="650">
          <figcaption>Sanitized demonstration data is used in project previews.</figcaption>
        </figure>
      </article>
    </div>
  </section>

  <section class="section" aria-labelledby="example-method-heading">
    <div class="container">
      <div class="section-head">
        <h2 id="example-method-heading">What a Jovel Creative example shows</h2>
        <p>The tool matters, but the reasoning behind it matters just as much.</p>
      </div>
      <div class="case-principles">
        <article><span class="case-principle-num">01</span><h3>The business problem</h3><p>What was slowing the work down, creating repetition or making information harder to manage.</p></article>
        <article><span class="case-principle-num">02</span><h3>What we built</h3><p>The spreadsheet, document or connected system created around that specific workflow.</p></article>
        <article><span class="case-principle-num">03</span><h3>What changed</h3><p>The practical improvement the finished tool creates, with estimates clearly identified when measured results are not yet available.</p></article>
      </div>
    </div>
  </section>

  <section class="final-cta" aria-labelledby="examples-cta-heading">
    <div class="container">
      <h2 id="examples-cta-heading">Have information scattered across too many files?</h2>
      <p>Start with what is not working. We will work out what the right tool should be.</p>
      <div class="cta-row">
        <a class="btn btn-invert" href="/start-a-project">Start a Project</a>
        <a class="btn btn-invert-outline" href="/services">See Services</a>
      </div>
    </div>
  </section>

<?php require __DIR__ . '/includes/footer.php'; ?>
