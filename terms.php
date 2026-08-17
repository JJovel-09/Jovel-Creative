<?php
require __DIR__ . '/includes/config.php';

$page_id     = 'terms';
$title       = 'Website Terms | Jovel Creative';
$description = 'Terms for using the Jovel Creative public website. Paid project work is governed by a separate project agreement.';
$canonical   = '/terms';
$extra_stylesheet = '/css/legal.css';

$og_title       = 'Website Terms | Jovel Creative';
$og_description = 'Plain-language terms for using the Jovel Creative website.';

require __DIR__ . '/includes/header.php';
?>

  <section class="legal-hero">
    <div class="container">
      <div class="legal-hero-inner">
        <span class="tag">Website Terms</span>
        <h1>Terms for using the Jovel Creative website.</h1>
        <p class="legal-hero-sub">These terms apply to the public website. They do not replace the separate quote and project agreement used for paid client work.</p>
        <div class="legal-meta">
          <span>Last updated: August 17, 2026</span>
          <span>Applies to: jovelcreative.com</span>
        </div>
      </div>
    </div>
  </section>

  <section class="legal-section">
    <div class="container legal-layout">
      <aside class="legal-nav" aria-label="Website Terms sections">
        <h2>On this page</h2>
        <ul>
          <li><a href="#use">Using this website</a></li>
          <li><a href="#projects">Project inquiries and quotes</a></li>
          <li><a href="#limitations">Service boundaries</a></li>
          <li><a href="#content">Website content and ownership</a></li>
          <li><a href="#conduct">Acceptable use</a></li>
          <li><a href="#availability">Availability and third parties</a></li>
          <li><a href="#changes">Changes</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </aside>

      <div class="legal-content">
        <div class="legal-summary">
          <h2>The important distinction</h2>
          <p>Submitting a form, sending an email or reviewing information on this site does not create a client relationship or require Jovel Creative to accept a project. Paid work begins only under the project process and terms agreed separately with the client.</p>
        </div>

        <section class="legal-block" id="use">
          <h2>Using this website</h2>
          <p>By using jovelcreative.com, you agree to use the site lawfully and in a way that does not interfere with its operation, security or use by others.</p>
          <p>The website is intended to explain Jovel Creative services, show examples, provide general information and allow potential clients to submit project inquiries.</p>
        </section>

        <section class="legal-block" id="projects">
          <h2>Project inquiries, pricing and quotes</h2>
          <p>Information on the website, including starting prices, service descriptions, examples and expected process, is general information rather than a binding project offer.</p>
          <p>After the scope is understood, Jovel Creative may provide a fixed quote and separate project agreement. The approved quote, agreement and any approved scope changes govern that project. If those project documents conflict with this Website Terms page on a matter relating to paid work, the project documents control.</p>
          <p>Jovel Creative may decline an inquiry or determine that a requested project is outside the services offered.</p>
        </section>

        <section class="legal-block" id="limitations">
          <h2>Service boundaries</h2>
          <p>Jovel Creative builds and organizes business tools and documents based on the information, rules and source material provided for the project. Jovel Creative does not provide legal, accounting, tax, medical or regulatory judgment.</p>
          <p>Website content and examples are not professional advice in those fields. When a project depends on specialized professional judgment, the client is responsible for obtaining and providing appropriate authoritative direction.</p>
        </section>

        <section class="legal-block" id="content">
          <h2>Website content and ownership</h2>
          <p>Unless otherwise stated, the Jovel Creative website, its original copy, design, graphics, examples and other site content are owned by Jovel Creative or used with permission and may not be republished or presented as your own without permission.</p>
          <p>You may view, print or share public pages for ordinary personal or business reference, provided you do not remove attribution or misrepresent the material.</p>
          <p>Ownership and permitted use of custom client deliverables are governed by the separate project agreement, not by this Website Terms page.</p>
        </section>

        <section class="legal-block" id="conduct">
          <h2>Acceptable use</h2>
          <p>You may not use the website to:</p>
          <ul>
            <li>Attempt to gain unauthorized access to the website, server, forms or related systems.</li>
            <li>Submit malicious code, automated spam or intentionally false information.</li>
            <li>Interfere with security controls, availability or normal site operation.</li>
            <li>Use website content in a way that violates applicable law or another person's rights.</li>
          </ul>
          <p>Jovel Creative may block or limit access when reasonably necessary to protect the site or other users.</p>
        </section>

        <section class="legal-block" id="availability">
          <h2>Website availability, accuracy and third parties</h2>
          <p>We work to keep the website accurate and available, but website content may occasionally contain errors, become outdated or be temporarily unavailable. Jovel Creative may correct or update public website content without notice.</p>
          <p>The site may link to third-party websites or use third-party services. Jovel Creative does not control those third parties and their own terms and privacy practices apply when you use them.</p>
          <div class="legal-note">The public website is provided for general business information and project intake. Specific deliverables, deadlines, responsibilities, warranties and payment terms are established in the documents for an approved project.</div>
        </section>

        <section class="legal-block" id="changes">
          <h2>Changes to these terms</h2>
          <p>Jovel Creative may revise these Website Terms as the site or business changes. The updated date at the top of this page will show when the terms were revised. Continued use of the website after an update is subject to the revised terms.</p>
        </section>

        <section class="legal-contact" id="contact" aria-labelledby="terms-contact-heading">
          <h2 id="terms-contact-heading">Questions about these terms</h2>
          <p>Contact Jovel Creative at <a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a>.</p>
        </section>
      </div>
    </div>
  </section>

<?php require __DIR__ . '/includes/footer.php'; ?>
