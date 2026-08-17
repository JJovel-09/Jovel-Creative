<?php
require __DIR__ . '/includes/config.php';

$page_id     = 'accessibility';
$title       = 'Accessibility | Jovel Creative';
$description = 'Jovel Creative accessibility statement and contact information for reporting website accessibility barriers.';
$canonical   = '/accessibility';
$extra_stylesheet = '/css/legal.css';

$og_title       = 'Accessibility | Jovel Creative';
$og_description = 'How Jovel Creative approaches website accessibility and how to report a barrier.';

require __DIR__ . '/includes/header.php';
?>

  <section class="legal-hero">
    <div class="container">
      <div class="legal-hero-inner">
        <span class="tag">Accessibility</span>
        <h1>Built to be usable by more people.</h1>
        <p class="legal-hero-sub">Jovel Creative is building this website with accessibility as a core requirement, not an add-on. If something gets in your way, we want to know.</p>
        <div class="legal-meta">
          <span>Last updated: August 17, 2026</span>
          <span>Target: WCAG 2.2 Level AA</span>
        </div>
      </div>
    </div>
  </section>

  <section class="legal-section">
    <div class="container legal-layout">
      <aside class="legal-nav" aria-label="Accessibility page sections">
        <h2>On this page</h2>
        <ul>
          <li><a href="#commitment">Our commitment</a></li>
          <li><a href="#approach">How the site is built</a></li>
          <li><a href="#limitations">Limitations</a></li>
          <li><a href="#feedback">Report a barrier</a></li>
          <li><a href="#review">Ongoing review</a></li>
        </ul>
      </aside>

      <div class="legal-content">
        <div class="legal-summary">
          <h2>Our target</h2>
          <p>Jovel Creative aims for the Web Content Accessibility Guidelines, WCAG 2.2 Level AA, as the working standard for the redesigned site. That target guides design, development and testing, while recognizing that accessibility requires ongoing review rather than a one-time claim.</p>
        </div>

        <section class="legal-block" id="commitment">
          <h2>Our commitment</h2>
          <p>We want visitors to be able to understand the content, navigate the website and submit a project inquiry regardless of the device or interaction method they use.</p>
          <p>Accessibility is considered during structure, design, content and technical implementation. We also welcome feedback from people who encounter barriers we did not identify during testing.</p>
        </section>

        <section class="legal-block" id="approach">
          <h2>How the site is being built</h2>
          <p>The redesigned website includes accessibility-focused practices such as:</p>
          <ul>
            <li>Semantic page structure and meaningful heading order.</li>
            <li>Keyboard-accessible navigation and form controls.</li>
            <li>Visible focus indicators for interactive elements.</li>
            <li>A skip link that allows keyboard users to move directly to main content.</li>
            <li>Labels and instructions for form fields instead of relying on placeholders alone.</li>
            <li>Color and interface choices designed with readable contrast in mind.</li>
            <li>Responsive layouts that support smaller screens and text reflow.</li>
            <li>Reduced-motion support for visitors who request it through their device or browser settings.</li>
            <li>Plain-language content and consistent navigation patterns.</li>
          </ul>
        </section>

        <section class="legal-block" id="limitations">
          <h2>Limitations and third-party content</h2>
          <p>We are continuing to test the redesigned site, and a visitor may still encounter an accessibility issue. Some third-party services or documents may also have accessibility characteristics that Jovel Creative does not fully control.</p>
          <p>If a third-party format creates a barrier to information you need from Jovel Creative, contact us and we will work to provide the information in another reasonable format when possible.</p>
        </section>

        <section class="legal-block" id="feedback">
          <h2>Report an accessibility barrier</h2>
          <p>If you have difficulty using any part of jovelcreative.com, email <a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a>.</p>
          <p>If possible, include the page or feature involved, what you were trying to do and the browser, device or assistive technology you were using. You do not need to disclose a disability or medical information.</p>
          <div class="legal-note">If the website form itself is the barrier, email us directly. You do not need to use the form to request information or start a conversation about a project.</div>
        </section>

        <section class="legal-contact" id="review" aria-labelledby="access-review-heading">
          <h2 id="access-review-heading">Ongoing review</h2>
          <p>Accessibility will be checked as the site changes and when new pages or features are added. Feedback can be sent anytime to <a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a>.</p>
        </section>
      </div>
    </div>
  </section>

<?php require __DIR__ . '/includes/footer.php'; ?>
