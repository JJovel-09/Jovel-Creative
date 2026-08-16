<?php
require __DIR__ . '/includes/config.php';

$page_id     = 'start-a-project';
$title       = 'Start a Project | Jovel Creative';
$description = 'Tell Jovel Creative what is not working in your business. Share the problem, your current setup and what you need the finished tool to help you do.';
$extra_stylesheet = '/css/start-project.css';

$og_title       = 'Start a Project with Jovel Creative';
$og_description = 'You do not need to know what kind of tool you need. Start with the problem and Jovel Creative will help work out the right scope.';

$status = isset($_GET['status']) ? (string) $_GET['status'] : '';

$schema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'ContactPage',
    'name'        => 'Start a Project',
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

  <section class="page-hero project-hero">
    <div class="container">
      <span class="tag">Start a Project</span>
      <h1>Start with what is not working.</h1>
      <p class="page-hero-sub">You do not need to diagnose the solution first. Tell us what is taking too long, getting rebuilt, creating confusion or becoming hard to manage.</p>
    </div>
  </section>

  <section class="section project-section" aria-labelledby="project-form-heading">
    <div class="container project-layout">
      <div class="project-form-wrap">
<?php if ($status === 'sent'): ?>
        <div class="form-status form-status-success" role="status">
          <strong>Request received.</strong>
          <p>Thanks for reaching out. We will review what you shared and follow up at the email address you provided.</p>
        </div>
<?php elseif ($status === 'invalid'): ?>
        <div class="form-status form-status-error" role="alert">
          <strong>Please check the required fields.</strong>
          <p>Your request was not sent. Complete the required information and try again.</p>
        </div>
<?php elseif ($status === 'error'): ?>
        <div class="form-status form-status-error" role="alert">
          <strong>Your request could not be sent.</strong>
          <p>Please try again, or email <a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a>.</p>
        </div>
<?php endif; ?>

        <div class="project-form-head">
          <span class="tag">Project inquiry</span>
          <h2 id="project-form-heading">Tell us about the problem.</h2>
          <p>Most people finish this form in a few minutes. Required fields are marked with an asterisk.</p>
        </div>

        <form class="project-form" action="/project-request" method="post">
          <input type="hidden" name="form_started" value="<?= time() ?>">
          <div class="form-hp" aria-hidden="true">
            <label for="website_url">Leave this field blank</label>
            <input id="website_url" name="website_url" type="text" tabindex="-1" autocomplete="off">
          </div>

          <fieldset>
            <legend>About you</legend>
            <div class="form-grid form-grid-two">
              <div class="form-field">
                <label for="name">Your name <span aria-hidden="true">*</span></label>
                <input id="name" name="name" type="text" maxlength="100" autocomplete="name" required>
              </div>
              <div class="form-field">
                <label for="business_name">Business name <span aria-hidden="true">*</span></label>
                <input id="business_name" name="business_name" type="text" maxlength="140" autocomplete="organization" required>
              </div>
              <div class="form-field">
                <label for="email">Email <span aria-hidden="true">*</span></label>
                <input id="email" name="email" type="email" maxlength="160" autocomplete="email" required>
              </div>
              <div class="form-field">
                <label for="phone">Phone <span class="optional">Optional</span></label>
                <input id="phone" name="phone" type="tel" maxlength="40" autocomplete="tel">
              </div>
            </div>
          </fieldset>

          <fieldset>
            <legend>The project</legend>
            <div class="form-field">
              <label for="problem">What is not working right now? <span aria-hidden="true">*</span></label>
              <p class="field-help" id="problem-help">Describe the repeated task, scattered information, confusing document or workflow problem you want to fix.</p>
              <textarea id="problem" name="problem" rows="6" maxlength="2500" aria-describedby="problem-help" required></textarea>
            </div>

            <div class="form-field">
              <label for="desired_result">What would a better result help you do? <span aria-hidden="true">*</span></label>
              <p class="field-help" id="result-help">For example: quote jobs faster, track payments, hand a process to an employee, or stop rebuilding the same document.</p>
              <textarea id="desired_result" name="desired_result" rows="4" maxlength="1600" aria-describedby="result-help" required></textarea>
            </div>

            <div class="form-grid form-grid-two">
              <div class="form-field">
                <label for="service_interest">What do you think you may need?</label>
                <select id="service_interest" name="service_interest">
                  <option value="not-sure">I'm not sure yet</option>
                  <option value="tracker">Tracker or operational spreadsheet</option>
                  <option value="calculator">Calculator or planning tool</option>
                  <option value="client-document">Proposal or client document</option>
                  <option value="sop">SOP or process guide</option>
                  <option value="refresh">Document refresh or redesign</option>
                  <option value="toolkit">Connected toolkit or system</option>
                  <option value="other">Something else</option>
                </select>
              </div>
              <div class="form-field">
                <label for="current_setup">What are you using now?</label>
                <select id="current_setup" name="current_setup">
                  <option value="not-sure">Not sure how to describe it</option>
                  <option value="spreadsheets">Spreadsheets</option>
                  <option value="documents">Documents or PDFs</option>
                  <option value="notes-email">Notes, email or messages</option>
                  <option value="software">Existing business software</option>
                  <option value="mixed">A mix of several things</option>
                  <option value="nothing-formal">Nothing formal yet</option>
                </select>
              </div>
            </div>

            <div class="form-grid form-grid-two">
              <div class="form-field">
                <label for="timeline">When would you like it ready? <span aria-hidden="true">*</span></label>
                <select id="timeline" name="timeline" required>
                  <option value="">Choose one</option>
                  <option value="no-deadline">No hard deadline</option>
                  <option value="within-month">Within about a month</option>
                  <option value="two-four-weeks">Within 2 to 4 weeks</option>
                  <option value="one-two-weeks">Within 1 to 2 weeks</option>
                  <option value="specific-date">I have a specific date</option>
                </select>
              </div>
              <div class="form-field">
                <label for="budget">Approximate project budget <span class="optional">Optional</span></label>
                <select id="budget" name="budget">
                  <option value="not-sure">Not sure yet</option>
                  <option value="under-500">Under $500</option>
                  <option value="500-999">$500 to $999</option>
                  <option value="1000-1499">$1,000 to $1,499</option>
                  <option value="1500-2999">$1,500 to $2,999</option>
                  <option value="3000-plus">$3,000+</option>
                </select>
              </div>
            </div>

            <div class="form-field">
              <label for="target_date">Specific deadline <span class="optional">Optional</span></label>
              <input id="target_date" name="target_date" type="date">
            </div>

            <div class="form-field">
              <label for="anything_else">Anything else we should know? <span class="optional">Optional</span></label>
              <textarea id="anything_else" name="anything_else" rows="4" maxlength="1600"></textarea>
            </div>
          </fieldset>

          <div class="form-privacy">
            <div class="form-privacy-copy">
              <strong>Please do not send sensitive working data here.</strong>
              <p>This public form does not accept file uploads. If source files are needed to prepare a fixed quote, we will arrange a private file review after we determine the project is a fit.</p>
            </div>
            <label class="form-check" for="privacy_ack">
              <input id="privacy_ack" name="privacy_ack" type="checkbox" value="yes" required>
              <span>I understand and will not include sensitive personal, financial, medical, payment-card or confidential client information in this form. <span aria-hidden="true">*</span></span>
            </label>
          </div>

          <div class="form-submit-row">
            <button class="btn btn-primary" type="submit">Send Project Request</button>
            <p>Submitting this form is an inquiry, not a project agreement. Scope and fixed pricing are confirmed separately.</p>
          </div>
        </form>
      </div>

      <aside class="project-aside" aria-label="What happens after you submit">
        <div class="project-aside-section">
          <span class="tag">What happens next</span>
          <ol class="project-steps">
            <li><span>01</span><div><strong>We review the problem.</strong><p>We look at the request, the likely fit and whether anything needs clarification.</p></div></li>
            <li><span>02</span><div><strong>We define the scope.</strong><p>If needed, we arrange a private review of the files or information behind the project.</p></div></li>
            <li><span>03</span><div><strong>You get a fixed quote.</strong><p>You see what is included, what is not included, the price and expected timing before you approve anything.</p></div></li>
          </ol>
        </div>

        <div class="project-aside-section project-fit-note">
          <strong>You do not need to choose the service first.</strong>
          <p>If you know the problem but not the right tool, choose “I'm not sure yet.” Figuring that out is part of the process.</p>
        </div>

        <div class="project-aside-section project-direct">
          <span class="tag">Prefer email?</span>
          <p><a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a></p>
          <small>Do not email sensitive files before we arrange a file review.</small>
        </div>

        <div class="project-aside-links">
          <a href="/pricing">See Pricing</a>
          <a href="/faq">Read FAQ</a>
          <a href="/examples">See an Example</a>
        </div>
      </aside>
    </div>
  </section>

<?php require __DIR__ . '/includes/footer.php'; ?>
