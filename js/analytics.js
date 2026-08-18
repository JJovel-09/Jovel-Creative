/**
 * JOVEL CREATIVE - LEAN GOOGLE ANALYTICS 4 EVENTS
 *
 * Page views are handled by the shared Google tag in includes/footer.php.
 * This file tracks only a small set of business-useful interactions.
 */
(function () {
  'use strict';

  function track(eventName, params) {
    if (typeof window.gtag !== 'function') return;

    window.gtag('event', eventName, Object.assign({
      page_path: window.location.pathname
    }, params || {}));
  }

  function initStartProjectTracking() {
    document.querySelectorAll('a[href="/start-a-project"]').forEach(function (link) {
      link.addEventListener('click', function () {
        track('start_project_click', {
          link_text: link.textContent.trim()
        });
      });
    });
  }

  function initExampleTracking() {
    document.querySelectorAll('a[href="/ays-hospitality-operations-system"]').forEach(function (link) {
      link.addEventListener('click', function () {
        track('example_view_click', {
          example_name: 'AYS Hospitality Client & Event Operations System',
          link_text: link.textContent.trim()
        });
      });
    });
  }

  function initEmailTracking() {
    document.querySelectorAll('a[href^="mailto:"]').forEach(function (link) {
      link.addEventListener('click', function () {
        track('email_click', {
          link_text: link.textContent.trim()
        });
      });
    });
  }

  function trackSuccessfulInquiry() {
    if (window.location.pathname !== '/start-a-project') return;

    var params = new URLSearchParams(window.location.search);
    if (params.get('status') !== 'sent') return;

    track('project_inquiry_submit');

    /* Remove the success query parameter after the event is recorded so a
       refresh does not create a second submission event. The rendered success
       message remains visible until the visitor navigates away or refreshes. */
    if (window.history && typeof window.history.replaceState === 'function') {
      window.history.replaceState({}, document.title, '/start-a-project');
    }
  }

  function initialize() {
    initStartProjectTracking();
    initExampleTracking();
    initEmailTracking();
    trackSuccessfulInquiry();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initialize);
  } else {
    initialize();
  }
})();
