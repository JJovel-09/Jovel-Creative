/**
 * =====================================================
 * JOVEL CREATIVE - INTERACTIVE FEATURES
 * Phase 1: Live Code Editor, Quote Engine, Map, Timeline
 * =====================================================
 */

// ==================== LIVE CODE EDITOR ====================
function initCodeEditor() {
  const htmlInput = document.getElementById('html-input');
  const previewFrame = document.getElementById('preview-frame');

  if (!htmlInput || !previewFrame) return;

  function updatePreview() {
    const code = htmlInput.value;
    const doc = previewFrame.contentDocument || previewFrame.contentWindow.document;
    doc.open();
    doc.write(`
      <!DOCTYPE html>
      <html>
      <head>
        <style>
          body {
            font-family: 'Inter', sans-serif;
            padding: 20px;
            margin: 0;
            color: #1a365d;
          }
          h1 { color: #f97316; margin: 0 0 10px 0; }
          p { margin: 0; line-height: 1.6; }
        </style>
      </head>
      <body>${code}</body>
      </html>
    `);
    doc.close();
  }

  // Update preview on input
  htmlInput.addEventListener('input', updatePreview);

  // Initial preview
  updatePreview();
}

// ==================== INSTANT QUOTE CALCULATOR ====================
function initQuoteCalculator() {
  const form = document.getElementById('quote-form');
  const resultCard = document.getElementById('quote-result');
  const closeBtn = resultCard?.querySelector('.result-close');
  const finalPriceEl = document.getElementById('final-price');
  const packageNameEl = document.getElementById('package-name');
  const packageFeaturesEl = document.getElementById('package-features');

  if (!form || !resultCard) return;

  // Pricing logic
  const basePrices = {
    5: 2000,   // Starter
    8: 3500,   // Professional
    12: 5500   // Premium
  };

  const packageNames = {
    5: 'Starter Package',
    8: 'Professional Package',
    12: 'Premium Package'
  };

  const packageFeatures = {
    5: [
      'Professional 5-page website',
      'Mobile responsive design',
      'Contact form integration',
      'Basic SEO optimization',
      'SSL certificate & hosting (6 months)',
      'Google Analytics setup',
      '2-3 week delivery',
      '2 rounds of revisions'
    ],
    8: [
      'Everything in Starter Package',
      'Custom brand-focused design',
      'Easy admin panel (CMS)',
      'Advanced form capabilities',
      'Google Maps integration',
      'Social media integration',
      'Blog setup (optional)',
      '1 year hosting included',
      '3 rounds of revisions'
    ],
    12: [
      'Everything in Professional Package',
      'Advanced features (booking, scheduling)',
      'Blog setup with full CMS',
      'Custom integrations (APIs)',
      'Content migration from existing site',
      'Email marketing integration',
      'Search functionality',
      '1-hour training session',
      'Priority support',
      'Unlimited revisions during development'
    ]
  };

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    // Get form values
    const pageCount = parseInt(document.getElementById('page-count').value);
    const hasEcommerce = document.getElementById('ecommerce').checked;
    const isBilingual = document.getElementById('bilingual').checked;

    // Calculate price
    let price = basePrices[pageCount];

    if (hasEcommerce) price += 1500;
    if (isBilingual) price += 800;

    // Get package details
    const packageName = packageNames[pageCount];
    let features = [...packageFeatures[pageCount]];

    // Add optional features
    if (hasEcommerce) {
      features.push('E-commerce integration (products, cart, payments)');
    }
    if (isBilingual) {
      features.push('Bilingual support (English & Spanish)');
    }

    // Calculate founding client price (30% off)
    const foundingPrice = Math.round(price * 0.7);

    // Update result card
    finalPriceEl.textContent = `$${price.toLocaleString()}`;

    // Update founding price if element exists
    const foundingPriceEl = document.getElementById('founding-price');
    if (foundingPriceEl) {
      foundingPriceEl.textContent = `$${foundingPrice.toLocaleString()}`;
    }

    packageNameEl.textContent = packageName;
    packageFeaturesEl.innerHTML = features.map(f => `<li>${f}</li>`).join('');

    // Update booking link with founding price
    const bookBtn = resultCard.querySelector('.btn-accent');
    const packageSlug = packageName.toLowerCase().replace(' package', '').replace(' ', '-');
    bookBtn.href = `/contact.html?founding=true&quote=${packageSlug}&price=${foundingPrice}`;

    // Show result card with animation
    resultCard.classList.add('show');
  });

  // Close result card
  if (closeBtn) {
    closeBtn.addEventListener('click', () => {
      resultCard.classList.remove('show');
    });
  }

  // Close on outside click
  document.addEventListener('click', (e) => {
    if (resultCard.classList.contains('show') &&
        !resultCard.contains(e.target) &&
        !form.contains(e.target)) {
      resultCard.classList.remove('show');
    }
  });
}

// ==================== INTERACTIVE MAP ====================
function initInteractiveMap() {
  const cityMarkers = document.querySelectorAll('.city-marker');
  const tooltip = document.getElementById('map-tooltip');

  if (!tooltip) return;

  const cityData = {
    'frederick': {
      name: 'Frederick',
      info: 'In-person consultations available'
    },
    'urbana': {
      name: 'Urbana',
      info: 'In-person consultations available'
    },
    'mount-airy': {
      name: 'Mount Airy',
      info: 'In-person consultations available'
    },
    'rockville': {
      name: 'Rockville',
      info: 'In-person consultations available'
    },
    'gaithersburg': {
      name: 'Gaithersburg',
      info: 'In-person consultations available'
    },
    'germantown': {
      name: 'Germantown',
      info: 'In-person consultations available'
    },
    'silver-spring': {
      name: 'Silver Spring',
      info: 'In-person consultations available'
    },
    'bethesda': {
      name: 'Bethesda',
      info: 'In-person consultations available'
    }
  };

  cityMarkers.forEach(marker => {
    marker.addEventListener('mouseenter', (e) => {
      const cityId = marker.dataset.city;
      const data = cityData[cityId];

      if (!data) return;

      // Update tooltip content
      tooltip.querySelector('.tooltip-city').textContent = data.name;
      tooltip.querySelector('.tooltip-info').textContent = data.info;

      // Position tooltip
      const rect = marker.getBoundingClientRect();
      const container = document.querySelector('.local-map-container').getBoundingClientRect();

      tooltip.style.left = `${rect.left - container.left + rect.width / 2}px`;
      tooltip.style.top = `${rect.top - container.top - 10}px`;
      tooltip.style.transform = 'translate(-50%, -100%)';

      // Show tooltip
      tooltip.classList.add('show');
    });

    marker.addEventListener('mouseleave', () => {
      tooltip.classList.remove('show');
    });
  });
}

// ==================== PROCESS TIMELINE ANIMATIONS ====================
function initTimelineAnimations() {
  const timelineSteps = document.querySelectorAll('.timeline-step');

  if (timelineSteps.length === 0) return;

  // Intersection Observer for scroll animations
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, {
    threshold: 0.2
  });

  timelineSteps.forEach(step => {
    observer.observe(step);

    // Click to expand details
    step.addEventListener('click', () => {
      const isExpanded = step.classList.contains('expanded');

      // Close all other steps
      timelineSteps.forEach(s => s.classList.remove('expanded'));

      // Toggle current step
      if (!isExpanded) {
        step.classList.add('expanded');
      }
    });
  });
}

// ==================== COUNTUP ANIMATIONS ====================
function initCountUpAnimations() {
  const counters = document.querySelectorAll('.metric-value[data-count]');

  if (counters.length === 0) return;

  function animateCount(element) {
    const target = parseInt(element.dataset.count);
    const duration = 2000; // 2 seconds
    const steps = 60;
    const increment = target / steps;
    let current = 0;
    let step = 0;

    const timer = setInterval(() => {
      step++;
      current = Math.min(Math.round(increment * step), target);
      element.textContent = current;

      if (current >= target) {
        clearInterval(timer);
      }
    }, duration / steps);
  }

  // Intersection Observer for triggering animations
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting && entry.target.dataset.count) {
        animateCount(entry.target);
        entry.target.dataset.count = ''; // Prevent re-animation
      }
    });
  }, {
    threshold: 0.5
  });

  counters.forEach(counter => observer.observe(counter));
}

// ==================== DARK MODE TOGGLE ====================
function initDarkMode() {
  const toggle = document.querySelector('.dark-mode-toggle');

  if (!toggle) return;

  // Check for saved preference
  const savedMode = localStorage.getItem('darkMode');
  if (savedMode === 'enabled') {
    document.body.classList.add('dark-mode');
  }

  toggle.addEventListener('click', () => {
    const isDark = document.body.classList.toggle('dark-mode');
    localStorage.setItem('darkMode', isDark ? 'enabled' : 'disabled');
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

// ==================== MOBILE MENU ====================
function initMobileMenu() {
  const toggle = document.querySelector('.mobile-menu-toggle');
  const menu = document.querySelector('.nav-menu');

  if (!toggle || !menu) return;

  toggle.addEventListener('click', () => {
    const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
    toggle.setAttribute('aria-expanded', !isExpanded);
    menu.classList.toggle('show');
    document.body.classList.toggle('menu-open');
  });

  // Close menu when clicking outside
  document.addEventListener('click', (e) => {
    if (!toggle.contains(e.target) && !menu.contains(e.target)) {
      toggle.setAttribute('aria-expanded', 'false');
      menu.classList.remove('show');
      document.body.classList.remove('menu-open');
    }
  });
}

// ==================== SCROLL REVEAL ANIMATIONS ====================
function initScrollReveal() {
  const elements = document.querySelectorAll('.fade-in, .capability-card, .benefit-item, .founding-price-card, .proof-card, .area-card');

  if (elements.length === 0) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        // Unobserve after animation to prevent re-triggering
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  });

  elements.forEach(el => observer.observe(el));
}

// ==================== PARALLAX EFFECT ====================
function initParallax() {
  const hero = document.querySelector('.hero-gradient-bg');

  if (!hero) return;

  let ticking = false;

  window.addEventListener('scroll', () => {
    if (!ticking) {
      window.requestAnimationFrame(() => {
        const scrolled = window.pageYOffset;
        const parallaxSpeed = 0.5;
        hero.style.transform = `translateY(${scrolled * parallaxSpeed}px)`;
        ticking = false;
      });
      ticking = true;
    }
  });
}

// ==================== SMOOTH CARD INTERACTIONS ====================
function initCardInteractions() {
  const cards = document.querySelectorAll('.area-card, .capability-card, .proof-card, .founding-price-card');

  cards.forEach(card => {
    card.addEventListener('mouseenter', function() {
      this.style.transition = 'all 0.5s cubic-bezier(0.4, 0, 0.2, 1)';
    });

    card.addEventListener('mousemove', function(e) {
      const rect = this.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;

      const centerX = rect.width / 2;
      const centerY = rect.height / 2;

      const rotateX = (y - centerY) / 20;
      const rotateY = (centerX - x) / 20;

      this.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-12px)`;
    });

    card.addEventListener('mouseleave', function() {
      this.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(0)';
    });
  });
}

// ==================== INITIALIZE ALL FEATURES ====================
document.addEventListener('DOMContentLoaded', () => {
  initCodeEditor();
  initQuoteCalculator();
  initInteractiveMap();
  initTimelineAnimations();
  initCountUpAnimations();
  initDarkMode();
  initSmoothScroll();
  initMobileMenu();
  initScrollReveal();
  initParallax();
  initCardInteractions();

  console.log('✨ Jovel Creative interactive features loaded!');
});

// ==================== PERFORMANCE MONITORING ====================
// Log page load performance
window.addEventListener('load', () => {
  if ('performance' in window) {
    const perfData = window.performance.timing;
    const pageLoadTime = perfData.loadEventEnd - perfData.navigationStart;
    console.log(`⚡ Page loaded in ${(pageLoadTime / 1000).toFixed(2)}s`);
  }
});
