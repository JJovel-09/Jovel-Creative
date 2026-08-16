<?php
require __DIR__ . '/includes/config.php';

$page_id     = 'faq';
$title       = 'Frequently Asked Questions | Jovel Creative';
$description = 'Answers about Jovel Creative custom business tools, fixed pricing, payments, revisions, ownership, AI use, file review and project fit.';
$extra_stylesheet = '/css/faq.css';

$og_title       = 'Questions about working with Jovel Creative';
$og_description = 'Clear answers about custom business tools, pricing, ownership, revisions and how projects work.';

$faqs = [
    [
        'q' => 'Do I need to know what kind of tool I need?',
        'a' => 'No. Start with what is not working. Tell us what is taking too long, getting rebuilt, creating confusion or becoming hard to manage. Figuring out what to build is part of the service.',
    ],
    [
        'q' => 'What can Jovel Creative build?',
        'a' => 'Custom trackers and operational spreadsheets, calculators and planning tools, proposals and client documents, SOPs and process guides, document refreshes, and connected business toolkits. The right format depends on the problem and workflow.',
    ],
    [
        'q' => 'Why not just use AI or a template?',
        'a' => 'AI and templates can produce a starting point. The harder part is deciding what information matters, how the workflow should be structured, what needs to connect, what should be tested and whether the finished tool will actually hold up in use. Jovel Creative is responsible for that structure, judgment and final review.',
    ],
    [
        'q' => 'How does pricing work?',
        'a' => 'Each service has a starting price. After the scope is clear, you receive a fixed quote before the build begins. The quote reflects what you are starting with, what the tool needs to do, the deliverables involved and the amount of testing required.',
    ],
    [
        'q' => 'How do payments work?',
        'a' => 'Projects under $500 are paid in full before work begins. Projects from $500 to $1,499 use a 50% initial payment and 50% before final delivery. Projects of $1,500 or more use a 40% initial payment, 30% at an agreed milestone and 30% before final delivery.',
    ],
    [
        'q' => 'What happens if I ask for something new after the project starts?',
        'a' => 'If a new request changes the functionality, workflow, deliverables, data work or project complexity, we identify it before doing the additional work. You can keep the original scope, adjust the scope or approve the added work. There are no silent scope changes.',
    ],
    [
        'q' => 'How do revisions work?',
        'a' => 'The revision allowance is stated in your quote before work begins. Feedback is collected as one consolidated review so changes can be handled efficiently. A new requirement is treated as a scope change rather than a revision.',
    ],
    [
        'q' => 'What software will my tool use?',
        'a' => 'The platform is agreed on before the build. Depending on the project, that may be Excel, Google Sheets, Word or another appropriate platform. The goal is to fit the tool to the way your business already works, not force you into unnecessary software.',
    ],
    [
        'q' => 'Do you use AI?',
        'a' => 'AI may be used behind the scenes to support parts of the work, but it is not the finished product and it does not replace review. Jovel Creative remains responsible for the structure, testing, factual checks and final deliverable.',
    ],
    [
        'q' => 'Who owns the finished files?',
        'a' => 'After full payment, you receive the customized final deliverables for your business to keep, edit and use. Jovel Creative retains its general methods, know-how and reusable non-client-specific components.',
    ],
    [
        'q' => 'What if a tracker or calculator does not work as delivered?',
        'a' => 'Custom trackers and calculators include a 14-day functionality guarantee for the functionality Jovel Creative delivered in the agreed platform. If something we built is not working as delivered, we correct it. New features, changed requirements or later client modifications are separate updates.',
    ],
    [
        'q' => 'Can I upload my working files through the website?',
        'a' => 'No public file uploads are used. If reviewing source files is necessary before a fixed quote, we arrange that privately after the project appears to be a good fit. Sensitive information should not be sent through the public project form.',
    ],
    [
        'q' => 'How long will my project take?',
        'a' => 'Timing depends on the scope and current capacity. Your expected schedule is provided with the quote before you approve the project, so you know the timing before the build begins.',
    ],
];

$schema = [
    '@context' => 'https://schema.org',
    '@type'    => 'FAQPage',
    'mainEntity' => array_map(static function ($faq) {
        return [
            '@type' => 'Question',
            'name'   => $faq['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => $faq['a'],
            ],
        ];
    }, $faqs),
];

require __DIR__ . '/includes/header.php';
?>

  <section class="page-hero faq-hero">
    <div class="container">
      <span class="tag">FAQ</span>
      <h1>Questions before you start a project.</h1>
      <p class="page-hero-sub">The short version: start with the problem. We will help work out the right tool, scope and fixed price from there.</p>
    </div>
  </section>

  <section class="section" aria-labelledby="faq-heading">
    <div class="container faq-layout">
      <div class="faq-intro">
        <span class="tag">The practical details</span>
        <h2 id="faq-heading">What most clients want to know first.</h2>
        <p>Open only the questions that matter to you. If something is not covered here, include it when you start a project.</p>
        <a class="btn btn-secondary" href="/pricing">See Pricing</a>
      </div>

      <div class="faq-list">
<?php foreach ($faqs as $index => $faq): ?>
        <details class="faq-item"<?= $index === 0 ? ' open' : '' ?>>
          <summary>
            <span class="faq-num" aria-hidden="true"><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></span>
            <span><?= e($faq['q']) ?></span>
          </summary>
          <div class="faq-answer">
            <p><?= e($faq['a']) ?></p>
          </div>
        </details>
<?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="faq-boundary" aria-labelledby="fit-heading">
    <div class="container">
      <div class="faq-boundary-inner">
        <div>
          <span class="tag">Project fit</span>
          <h2 id="fit-heading">Some decisions stay with your business.</h2>
        </div>
        <p>Jovel Creative can organize information and build tools around the rules you provide. We do not provide legal, accounting, tax, medical or regulatory judgment. When those decisions affect a project, your business or qualified adviser provides the authoritative direction.</p>
      </div>
    </div>
  </section>

  <section class="final-cta" aria-labelledby="faq-cta-heading">
    <div class="container">
      <h2 id="faq-cta-heading">Still not sure what you need?</h2>
      <p>That is fine. Tell us what is not working. Diagnosing the right tool is part of the project process.</p>
      <div class="cta-row">
        <a class="btn btn-invert" href="/start-a-project">Start a Project</a>
        <a class="btn btn-invert-outline" href="/examples">See an Example</a>
      </div>
    </div>
  </section>

<?php require __DIR__ . '/includes/footer.php'; ?>
