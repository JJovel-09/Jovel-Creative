<?php
require __DIR__ . '/includes/config.php';

$page_id     = 'privacy';
$title       = 'Privacy | Jovel Creative';
$description = 'How Jovel Creative handles information submitted through the website and during project inquiries.';
$canonical   = '/privacy';
$extra_stylesheet = '/css/legal.css';

$og_title       = 'Privacy | Jovel Creative';
$og_description = 'A plain-language explanation of how Jovel Creative handles website and project inquiry information.';

require __DIR__ . '/includes/header.php';
?>

  <section class="legal-hero">
    <div class="container">
      <div class="legal-hero-inner">
        <span class="tag">Privacy</span>
        <h1>We collect what we need to respond and do the work.</h1>
        <p class="legal-hero-sub">This page explains what information Jovel Creative receives through the website, why we use it and how to contact us about it.</p>
        <div class="legal-meta">
          <span>Last updated: August 17, 2026</span>
          <span>Applies to: jovelcreative.com</span>
        </div>
      </div>
    </div>
  </section>

  <section class="legal-section">
    <div class="container legal-layout">
      <aside class="legal-nav" aria-label="Privacy page sections">
        <h2>On this page</h2>
        <ul>
          <li><a href="#information">Information we receive</a></li>
          <li><a href="#use">How we use it</a></li>
          <li><a href="#sharing">Service providers and sharing</a></li>
          <li><a href="#retention">Retention and security</a></li>
          <li><a href="#choices">Your choices and requests</a></li>
          <li><a href="#changes">Changes to this notice</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </aside>

      <div class="legal-content">
        <div class="legal-summary">
          <h2>The short version</h2>
          <p>Jovel Creative uses information to respond to inquiries, prepare quotes, communicate about projects and operate the website. We do not sell personal information. The public project form does not accept file uploads, and we ask visitors not to submit sensitive working data through it.</p>
        </div>

        <section class="legal-block" id="information">
          <h2>Information we receive</h2>
          <h3>Project inquiry information</h3>
          <p>If you use the Start a Project form, we may receive your name, business name, email address, optional phone number, information about what is not working, the result you want, your current setup, timing, budget range and anything else you choose to include.</p>

          <h3>Email and project communications</h3>
          <p>If you email Jovel Creative or move forward with a project, we receive the information you choose to provide in those communications. If reviewing working files is necessary, that exchange is arranged privately after initial qualification rather than through the public website form.</p>

          <h3>Technical information</h3>
          <p>Our hosting and security systems may automatically record limited technical information needed to serve and protect the website, such as IP address, browser or device information, request time, requested page and security or error logs.</p>

          <div class="legal-note"><strong>Please do not send sensitive information through the public form.</strong> Do not include passwords, account credentials, Social Security numbers, payment card details, health information or other highly sensitive data unless Jovel Creative has specifically arranged an appropriate method for the project.</div>
        </section>

        <section class="legal-block" id="use">
          <h2>How we use information</h2>
          <p>We use information we receive for practical business purposes, including:</p>
          <ul>
            <li>Responding to questions and project inquiries.</li>
            <li>Determining whether a project appears to be a good fit.</li>
            <li>Clarifying scope and preparing a fixed quote.</li>
            <li>Communicating about approved work, revisions, delivery and support.</li>
            <li>Operating, maintaining, troubleshooting and securing the website.</li>
            <li>Keeping business records when reasonably necessary.</li>
          </ul>
          <p>We do not use the public project form to enroll you in marketing emails. If Jovel Creative later offers an optional mailing list, that signup will be separate.</p>
        </section>

        <section class="legal-block" id="sharing">
          <h2>Service providers and sharing</h2>
          <p>Jovel Creative may use service providers that are necessary to operate the business and website, such as website hosting, email delivery, file exchange, payment or business administration providers. Those providers may process information as needed to provide their services.</p>
          <p>We may also disclose information when reasonably necessary to comply with law, protect the security or rights of Jovel Creative or others, investigate misuse or respond to a valid legal request.</p>
          <p><strong>Jovel Creative does not sell personal information.</strong> We also do not use personal information from project inquiries for targeted advertising.</p>
        </section>

        <section class="legal-block" id="retention">
          <h2>Retention and security</h2>
          <p>We keep information only as long as reasonably necessary for the purpose it was collected, an active or potential business relationship, recordkeeping, security, dispute resolution or legal obligations. Retention can vary depending on the type of information and the project.</p>
          <p>Jovel Creative uses reasonable administrative and technical safeguards appropriate to the information we handle. No website, email system or storage method can be guaranteed completely secure, so we also limit what the public form is designed to collect.</p>
        </section>

        <section class="legal-block" id="choices">
          <h2>Your choices and requests</h2>
          <p>Depending on where you live and the law that applies, you may have rights regarding personal information about you, such as requesting access, correction, deletion or information about how it is handled.</p>
          <p>You can also contact us if you simply want an old inquiry removed from our active records. We may need to retain limited information when required for legitimate business, security or legal reasons.</p>
          <p>To make a privacy request, email <a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a>. We may need enough information to verify the request before acting on it.</p>

          <h3>Children</h3>
          <p>Jovel Creative provides business services and the website is not directed to children. We do not knowingly seek personal information from children through the project inquiry form.</p>
        </section>

        <section class="legal-block" id="changes">
          <h2>Changes to this notice</h2>
          <p>We may update this Privacy notice as the website, services or information practices change. The updated date at the top of this page will show when the notice was revised.</p>
        </section>

        <section class="legal-contact" id="contact" aria-labelledby="privacy-contact-heading">
          <h2 id="privacy-contact-heading">Privacy questions</h2>
          <p>For questions or requests about information handled by Jovel Creative, contact:</p>
          <p><a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a></p>
        </section>
      </div>
    </div>
  </section>

<?php require __DIR__ . '/includes/footer.php'; ?>
