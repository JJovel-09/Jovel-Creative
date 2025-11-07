/**
 * =====================================================
 * PRIVACY POLICY - SCROLL ANIMATIONS
 * Smooth fade-ins inspired by DD.NYC aesthetic
 * =====================================================
 */

// ==================== SCROLL FADE-IN ANIMATIONS ====================
function initScrollAnimations() {
  const fadeElements = document.querySelectorAll('.fade-in');

  if (fadeElements.length === 0) return;

  const observerOptions = {
    root: null,
    rootMargin: '0px',
    threshold: 0.3 // Fade in when 30% visible (DD.NYC style)
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, observerOptions);

  fadeElements.forEach(element => {
    observer.observe(element);
  });
}

// ==================== SMOOTH SCROLL FOR ANCHOR LINKS ====================
function initSmoothScroll() {
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      if (href === '#') return;

      e.preventDefault();
      const target = document.querySelector(href);

      if (target) {
        const headerOffset = 80;
        const elementPosition = target.getBoundingClientRect().top;
        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

        window.scrollTo({
          top: offsetPosition,
          behavior: 'smooth'
        });
      }
    });
  });
}

// ==================== HIDE SCROLL INDICATOR ON SCROLL ====================
function initScrollIndicator() {
  const scrollIndicator = document.querySelector('.scroll-indicator');

  if (!scrollIndicator) return;

  window.addEventListener('scroll', () => {
    if (window.pageYOffset > 100) {
      scrollIndicator.style.opacity = '0';
      scrollIndicator.style.pointerEvents = 'none';
    } else {
      scrollIndicator.style.opacity = '1';
      scrollIndicator.style.pointerEvents = 'auto';
    }
  });
}

// ==================== INITIALIZE ALL ====================
document.addEventListener('DOMContentLoaded', () => {
  initScrollAnimations();
  initSmoothScroll();
  initScrollIndicator();

  console.log('Privacy policy animations loaded');
});
