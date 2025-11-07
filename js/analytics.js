/**
 * JOVEL CREATIVE - GOOGLE ANALYTICS 4 INTEGRATION
 * Comprehensive event tracking for user interactions
 *
 * SETUP INSTRUCTIONS:
 * 1. Replace 'G-XXXXXXXXXX' below with your actual GA4 Measurement ID
 * 2. Get your Measurement ID from Google Analytics > Admin > Data Streams
 * 3. See ANALYTICS-SETUP.md for complete setup guide
 */

// ==================== GOOGLE ANALYTICS 4 INITIALIZATION ====================

// IMPORTANT: Replace G-XXXXXXXXXX with your actual Measurement ID
const GA_MEASUREMENT_ID = 'G-XXXXXXXXXX';

// Initialize Google Analytics 4
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

// Configure GA4 with your settings
gtag('config', GA_MEASUREMENT_ID, {
  'send_page_view': true,
  'anonymize_ip': true, // GDPR compliance
  'cookie_flags': 'SameSite=None;Secure'
});

// ==================== COOKIE CONSENT ====================

/**
 * Simple cookie consent implementation
 * Shows banner if user hasn't made a choice yet
 */
function initCookieConsent() {
  // Check if user has already consented
  const hasConsented = localStorage.getItem('ga_consent');

  if (hasConsented === null) {
    showConsentBanner();
  } else if (hasConsented === 'declined') {
    // Disable GA if user declined
    disableAnalytics();
  }
}

/**
 * Show cookie consent banner
 */
function showConsentBanner() {
  const banner = document.createElement('div');
  banner.id = 'cookie-consent-banner';
  banner.style.cssText = `
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(26, 54, 93, 0.95);
    color: white;
    padding: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    z-index: 9999;
    box-shadow: 0 -4px 6px -1px rgba(0, 0, 0, 0.1);
    flex-wrap: wrap;
  `;

  banner.innerHTML = `
    <p style="margin: 0; flex: 1; min-width: 200px; line-height: 1.5;">
      We use cookies to enhance your user experience. By clicking <strong>ACCEPT</strong> or continuing to browse, you agree to our use of cookies and analytics.
    </p>
    <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
      <button id="ga-accept" style="
        background: #f97316;
        color: white;
        border: none;
        padding: 0.5rem 1.5rem;
        border-radius: 0.5rem;
        cursor: pointer;
        font-weight: 600;
        text-transform: uppercase;
      ">Accept</button>
      <button id="ga-decline" style="
        background: transparent;
        color: white;
        border: 2px solid white;
        padding: 0.5rem 1.5rem;
        border-radius: 0.5rem;
        cursor: pointer;
        font-weight: 600;
        text-transform: uppercase;
      ">Decline</button>
    </div>
  `;

  document.body.appendChild(banner);

  // Handle accept
  document.getElementById('ga-accept').addEventListener('click', function() {
    localStorage.setItem('ga_consent', 'accepted');
    banner.remove();
  });

  // Handle decline
  document.getElementById('ga-decline').addEventListener('click', function() {
    localStorage.setItem('ga_consent', 'declined');
    disableAnalytics();
    banner.remove();
  });
}

/**
 * Disable Google Analytics
 */
function disableAnalytics() {
  window['ga-disable-' + GA_MEASUREMENT_ID] = true;
}

// ==================== EVENT TRACKING ====================

/**
 * Track custom event
 * @param {string} eventName - Name of the event
 * @param {object} params - Event parameters
 */
function trackEvent(eventName, params = {}) {
  if (typeof gtag === 'function') {
    gtag('event', eventName, params);
  }
}

/**
 * Track button/CTA clicks
 */
function initCTATracking() {
  // Track "Get Free Quote" CTA buttons
  const ctaButtons = document.querySelectorAll('[id*="cta"]');
  ctaButtons.forEach(button => {
    button.addEventListener('click', function(e) {
      const buttonId = this.id || 'unknown';
      const buttonText = this.textContent.trim();

      trackEvent('cta_click', {
        'button_id': buttonId,
        'button_text': buttonText,
        'page_location': window.location.pathname
      });
    });
  });

  // Track specific important CTAs
  trackButtonClick('nav-cta', 'Navigation CTA Click');
  trackButtonClick('hero-cta-primary', 'Hero Primary CTA Click');
  trackButtonClick('hero-cta-secondary', 'Hero Secondary CTA Click');
  trackButtonClick('view-full-portfolio', 'View Portfolio CTA Click');
  trackButtonClick('view-all-services', 'View Services CTA Click');
  trackButtonClick('final-cta-contact', 'Final Section Contact CTA Click');
  trackButtonClick('final-cta-phone', 'Final Section Phone CTA Click');
}

/**
 * Track specific button click by ID
 */
function trackButtonClick(buttonId, eventLabel) {
  const button = document.getElementById(buttonId);
  if (button) {
    button.addEventListener('click', function() {
      trackEvent('button_click', {
        'event_label': eventLabel,
        'button_id': buttonId
      });
    });
  }
}

/**
 * Track phone number clicks
 */
function initPhoneTracking() {
  const phoneLinks = document.querySelectorAll('a[href^="tel:"]');
  phoneLinks.forEach(link => {
    link.addEventListener('click', function() {
      const phoneNumber = this.getAttribute('href').replace('tel:', '');

      trackEvent('phone_click', {
        'phone_number': phoneNumber,
        'link_text': this.textContent.trim(),
        'page_location': window.location.pathname
      });
    });
  });
}

/**
 * Track email clicks
 */
function initEmailTracking() {
  const emailLinks = document.querySelectorAll('a[href^="mailto:"]');
  emailLinks.forEach(link => {
    link.addEventListener('click', function() {
      const emailAddress = this.getAttribute('href').replace('mailto:', '');

      trackEvent('email_click', {
        'email_address': emailAddress,
        'link_text': this.textContent.trim(),
        'page_location': window.location.pathname
      });
    });
  });
}

/**
 * Track outbound links
 */
function initOutboundLinkTracking() {
  const links = document.querySelectorAll('a');
  links.forEach(link => {
    const href = link.getAttribute('href');

    // Check if it's an outbound link (external domain)
    if (href && (href.startsWith('http://') || href.startsWith('https://'))) {
      const currentDomain = window.location.hostname;
      const linkDomain = new URL(href).hostname;

      if (linkDomain !== currentDomain) {
        link.addEventListener('click', function() {
          trackEvent('outbound_link_click', {
            'link_url': href,
            'link_domain': linkDomain,
            'link_text': this.textContent.trim()
          });
        });
      }
    }
  });
}

/**
 * Track scroll depth
 * Tracks when user scrolls to 25%, 50%, 75%, and 100% of page
 */
function initScrollDepthTracking() {
  const thresholds = [25, 50, 75, 100];
  const trackedThresholds = new Set();

  window.addEventListener('scroll', debounce(function() {
    const scrollHeight = document.documentElement.scrollHeight - window.innerHeight;
    const scrolled = window.pageYOffset;
    const percentScrolled = Math.round((scrolled / scrollHeight) * 100);

    thresholds.forEach(threshold => {
      if (percentScrolled >= threshold && !trackedThresholds.has(threshold)) {
        trackedThresholds.add(threshold);

        trackEvent('scroll_depth', {
          'percent_scrolled': threshold,
          'page_location': window.location.pathname
        });
      }
    });
  }, 500));
}

/**
 * Track portfolio item views
 */
function initPortfolioTracking() {
  const portfolioItems = document.querySelectorAll('.portfolio-item');

  if (portfolioItems.length === 0) return;

  portfolioItems.forEach(item => {
    item.addEventListener('click', function() {
      const title = this.querySelector('h3')?.textContent || 'Unknown Project';

      trackEvent('portfolio_view', {
        'project_title': title,
        'page_location': window.location.pathname
      });
    });
  });
}

/**
 * Track service package interest
 * Fires when user scrolls to service packages section
 */
function initServicePackageTracking() {
  const pricingCards = document.querySelectorAll('.pricing-card');

  if (pricingCards.length === 0) return;

  const observerOptions = {
    root: null,
    rootMargin: '0px',
    threshold: 0.5 // Trigger when 50% visible
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting && !entry.target.dataset.tracked) {
        const packageTitle = entry.target.querySelector('.pricing-title')?.textContent || 'Unknown Package';

        trackEvent('service_package_view', {
          'package_name': packageTitle,
          'page_location': window.location.pathname
        });

        // Mark as tracked so we don't fire multiple times
        entry.target.dataset.tracked = 'true';
      }
    });
  }, observerOptions);

  pricingCards.forEach(card => observer.observe(card));
}

/**
 * Track form submission
 * This is called from form-handler.js when form is successfully submitted
 */
function trackFormSubmission(formId, formData = {}) {
  trackEvent('contact_form_submit', {
    'form_id': formId,
    'page_location': window.location.pathname,
    ...formData
  });
}

// Expose for use in form-handler.js
window.trackFormSubmission = trackFormSubmission;

// ==================== UTILITY FUNCTIONS ====================

/**
 * Debounce function to limit event firing
 */
function debounce(func, wait) {
  let timeout;
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout);
      func(...args);
    };
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
  };
}

// ==================== INITIALIZE ALL TRACKING ====================

// Wait for DOM to be ready
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initializeAnalytics);
} else {
  initializeAnalytics();
}

function initializeAnalytics() {
  // Show cookie consent if needed
  initCookieConsent();

  // Initialize all tracking functions
  initCTATracking();
  initPhoneTracking();
  initEmailTracking();
  initOutboundLinkTracking();
  initScrollDepthTracking();
  initPortfolioTracking();
  initServicePackageTracking();

  console.log('Google Analytics 4 tracking initialized');
}

// ==================== DEBUG MODE ====================
// Expose tracking functions for debugging (remove in production if desired)
if (typeof window !== 'undefined') {
  window.GATracking = {
    trackEvent,
    trackFormSubmission,
    GA_MEASUREMENT_ID
  };
}
