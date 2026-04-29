/**
 * JOVEL CREATIVE - TALLY FORM HELPER
 * Contact form now powered by Tally (tally.so/r/441VG5)
 * This file handles optional URL parameter prefill messaging only.
 */

document.addEventListener('DOMContentLoaded', function () {
  prefillPackageNote();
});

/**
 * If a visitor arrives via a package CTA link (e.g. /contact.html?package=standard)
 * update the sidebar package highlight so the right tier is visually flagged.
 */
function prefillPackageNote() {
  const params = new URLSearchParams(window.location.search);
  const pkg = params.get('package');
  if (!pkg) return;

  const labels = {
    base:     'Base — $89',
    standard: 'Standard — $149',
    premium:  'Premium — $199'
  };

  const label = labels[pkg.toLowerCase()];
  if (!label) return;

  // Find the "Packages at a glance" sidebar card and add a highlighted note
  const miniCards = document.querySelectorAll('.pkg-mini');
  miniCards.forEach(card => {
    const nameEl = card.querySelector('.pkg-mini-name');
    if (nameEl && nameEl.textContent.toLowerCase().includes(pkg.toLowerCase())) {
      card.style.background = '#fff7f0';
      card.style.border = '1.5px solid #e05a2b';
      card.style.borderRadius = '6px';
      card.style.padding = '0.5rem 0.6rem';
    }
  });
}

// Expose for debugging
if (typeof window !== 'undefined') {
  window.JovelFormHelper = { prefillPackageNote };
}
