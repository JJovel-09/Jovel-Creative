<?php
require __DIR__ . '/includes/config.php';

$page_id     = 'about';
$title       = 'About Jovel Creative | Practical Custom Business Tools';
$description = 'Jovel Creative helps small businesses turn scattered information, repeated manual work and rough documents into practical custom tools built around how the business actually works.';
$extra_stylesheet = '/css/about.css';

$og_title       = 'About Jovel Creative';
$og_description = 'Practical custom business tools built around the information and workflow a small business already has.';

$schema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'AboutPage',
    'name'        => 'About Jovel Creative',
    'description' => $description,
    'url'         => site_url(canonical_path($page_id)),
    'mainEntity'  => [
        '@type'       => 'Organization',
        'name'        => SITE_NAME,
        'url'         => site_url('/'),
        'email'       => CONTACT_EMAIL,
        'founder'     => [
            '@type' => 'Person',
            'name'  => 'Juan Jovel',
        ],
    ],
];

require __DIR__ . '/includes/header.php';
?>

  <section class="page-hero about-hero">
    <div class="container">
      <span class="tag">About</span>
      <h1>Practical business tools, built around how the work actually gets done.</h1>
      <p class="page-hero-sub">Jovel Creative helps small businesses turn scattered information, repeated manual work and rough documents into clear tools they can keep using.</p>
    </div>
  </section>

  <section class="section" aria-labelledby="why-heading">
    <div class="container">
      <div class="about-story">
        <article>
          <span class="tag">Why Jovel Creative exists</span>
          <h2 id="why-heading">Most small businesses already have the information.</h2>
          <p>The problem is often where that information lives. A customer list is in one file. Pricing is in another. A proposal gets copied from the last job. Important steps live in someone's head.</p>
          <p>Jovel Creative takes what is already there, figures out what needs structure and builds a practical tool around the way the business actually works.</p>
        </article>
        <article>
          <span class="tag">Behind the work</span>
          <h2>I'm Juan Jovel.</h2>
          <p>For more than 12 years, my work has centered on taking complicated information and making it clearer, more organized and easier for people to use. My background includes strategic communications and public-sector work where accuracy, deadlines and attention to detail matter, along with a Master of Public Administration from the University of Baltimore.</p>
          <p>That experience shaped how I approach Jovel Creative. I start by understanding the information you already have, how the work actually gets done and where the process is breaking down. Then I build something practical around it.</p>
          <p>I work in both English and Spanish.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="about-flow-section" aria-labelledby="flow-heading">
    <div class="container">
      <div class="about-flow-head">
        <span class="tag">The approach</span>
        <h2 id="flow-heading">The file is the deliverable. The structure is the value.</h2>
      </div>
      <div class="about-flow" aria-label="Jovel Creative approach">
        <div><small>What you have</small><strong>Information</strong><span>Files, notes, pricing, processes and business knowledge.</span></div>
        <span class="about-flow-arrow" aria-hidden="true">→</span>
        <div><small>What we do</small><strong>Structure</strong><span>Organize the workflow, rules, relationships and useful outputs.</span></div>
        <span class="about-flow-arrow" aria-hidden="true">→</span>
        <div class="is-result"><small>What you get</small><strong>A usable tool</strong><span>Built, tested and ready for the way your business works.</span></div>
      </div>
    </div>
  </section>

  <section class="section" aria-labelledby="principles-heading">
    <div class="container">
      <div class="section-head">
        <span class="tag">How the work is handled</span>
        <h2 id="principles-heading">Simple principles. No unnecessary complexity.</h2>
      </div>
      <div class="about-principles">
        <article><span>01</span><h3>Understand before building</h3><p>We start with the problem and the workflow, not a prebuilt template.</p></article>
        <article><span>02</span><h3>Structure before presentation</h3><p>A polished file is useful only if the information and logic underneath it make sense.</p></article>
        <article><span>03</span><h3>Human review before delivery</h3><p>Technology can speed up the work. Jovel Creative still reviews and approves the finished deliverable.</p></article>
        <article><span>04</span><h3>Keep the tool usable</h3><p>The platform is agreed on before the build, and the final files are designed to stay practical after handoff.</p></article>
      </div>
    </div>
  </section>

  <section class="section about-simple-section" aria-labelledby="simple-heading">
    <div class="container">
      <div class="about-simple">
        <div>
          <span class="tag">The right tool, not more software</span>
          <h2 id="simple-heading">You do not need another app just because the process is messy.</h2>
        </div>
        <div>
          <p>Sometimes the right answer is Excel. Sometimes it is Word. Sometimes it is a connected set of files. The platform should fit the work, not force the business into a more complicated system than it needs.</p>
        </div>
      </div>

      <div class="about-trust" aria-label="Jovel Creative working principles">
        <div><strong>Fixed pricing</strong><span>Scope and price before the build.</span></div>
        <div><strong>Editable ownership</strong><span>Your customized final files after full payment.</span></div>
        <div><strong>Human-reviewed</strong><span>Finished work is checked before delivery.</span></div>
        <div><strong>Minimal meetings</strong><span>Only the conversations the project actually needs.</span></div>
      </div>
    </div>
  </section>

  <section class="final-cta" aria-labelledby="about-cta-heading">
    <div class="container">
      <h2 id="about-cta-heading">Start with what is not working.</h2>
      <p>You do not need to diagnose the solution first. Tell us what is taking too long, getting rebuilt or becoming hard to manage.</p>
      <div class="cta-row">
        <a class="btn btn-invert" href="/start-a-project">Start a Project</a>
        <a class="btn btn-invert-outline" href="/examples">See an Example</a>
      </div>
    </div>
  </section>

<?php require __DIR__ . '/includes/footer.php'; ?>
