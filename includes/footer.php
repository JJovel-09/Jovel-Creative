<?php
/**
 * JOVEL CREATIVE, SHARED SITE FOOTER
 *
 * Owns the document from the closing </main> to the closing </html>,
 * including the shared script tag. Requires includes/config.php to
 * have been loaded first.
 */

/* Direct request guard, matching header.php. See that file. */
if (!defined('JOVEL_SITE')) {
    http_response_code(404);
    exit;
}
?>
</main>

<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <div>
        <h3><?= e(SITE_NAME) ?></h3>
        <p><?= e(SITE_DESCRIPTION) ?></p>
      </div>
      <div>
        <h3>Quick Links</h3>
        <ul>
<?php /* aria-current is carried by the primary navigation only, so the
         document announces one current page rather than two. */ ?>
<?php foreach (SITE_NAV as $item): ?>
          <li><a href="<?= e($item['path']) ?>"><?= e($item['label']) ?></a></li>
<?php endforeach; ?>
        </ul>
      </div>
      <div>
        <h3>Get In Touch</h3>
        <ul>
          <li><a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>&copy; <?= date('Y') ?> <?= e(SITE_NAME) ?>. All rights reserved.</span>
      <span>Built by Juan Jovel</span>
      <a href="/accessibility">Accessibility</a>
      <a href="/privacy">Privacy</a>
      <a href="/terms">Website Terms</a>
    </div>
  </div>
</footer>

<script src="/js/jovel.js"></script>
</body>
</html>
