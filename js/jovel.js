/* ============================================================
   JOVEL CREATIVE, HOMEPAGE BEHAVIOR
   Mobile navigation only. At the mobile breakpoint the header menu
   requires JavaScript; the footer retains the same destination links
   if scripting is unavailable.
   ============================================================ */
(function () {
  'use strict';

  var toggle = document.querySelector('.nav-toggle');
  var nav = document.getElementById('site-nav');

  if (!toggle || !nav) { return; }

  var MOBILE_QUERY = '(max-width: 759px)';

  function setOpen(open) {
    toggle.setAttribute('aria-expanded', String(open));
    nav.classList.toggle('open', open);
    toggle.textContent = open ? 'Close' : 'Menu';
  }

  function isOpen() {
    return toggle.getAttribute('aria-expanded') === 'true';
  }

  toggle.addEventListener('click', function () {
    setOpen(!isOpen());
  });

  /* Escape closes the menu and returns focus to the toggle. */
  document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape' && isOpen()) {
      setOpen(false);
      toggle.focus();
    }
  });

  /* Choosing a destination closes the menu. */
  nav.addEventListener('click', function (event) {
    if (event.target.closest('a') && isOpen()) {
      setOpen(false);
    }
  });

  /* Returning to the desktop layout clears the mobile state. */
  if (window.matchMedia) {
    var mobile = window.matchMedia(MOBILE_QUERY);
    var handleChange = function (event) {
      if (!event.matches && isOpen()) {
        setOpen(false);
      }
    };
    if (typeof mobile.addEventListener === 'function') {
      mobile.addEventListener('change', handleChange);
    } else if (typeof mobile.addListener === 'function') {
      mobile.addListener(handleChange);
    }
  }
})();
