/**
 * JOVEL CREATIVE - MAIN JAVASCRIPT
 * Handles navigation, smooth scrolling, mobile menu, and scroll animations
 */

// ==================== WAIT FOR DOM LOAD ====================
document.addEventListener('DOMContentLoaded', function() {

  // Initialize all functions
  initMobileMenu();
  initSmoothScroll();
  initScrollAnimations();
  initHeaderScroll();
  initActiveNavLinks();

});

// ==================== MOBILE MENU ====================
/**
 * Handle mobile menu toggle (hamburger menu)
 */
function initMobileMenu() {
  const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
  const navMenu = document.querySelector('.nav-menu');

  if (!mobileMenuToggle || !navMenu) return;

  // Toggle menu when hamburger is clicked
  mobileMenuToggle.addEventListener('click', function() {
    const isActive = navMenu.classList.toggle('active');
    mobileMenuToggle.classList.toggle('active');

    // Update aria-expanded for accessibility
    mobileMenuToggle.setAttribute('aria-expanded', isActive);

    // Prevent body scroll when menu is open
    if (isActive) {
      document.body.style.overflow = 'hidden';
    } else {
      document.body.style.overflow = '';
    }
  });

  // Close menu when a nav link is clicked
  const navLinks = navMenu.querySelectorAll('.nav-link, .btn-nav-cta');
  navLinks.forEach(link => {
    link.addEventListener('click', function() {
      navMenu.classList.remove('active');
      mobileMenuToggle.classList.remove('active');
      mobileMenuToggle.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    });
  });

  // Close menu when clicking outside
  document.addEventListener('click', function(event) {
    const isClickInsideMenu = navMenu.contains(event.target);
    const isClickOnToggle = mobileMenuToggle.contains(event.target);

    if (!isClickInsideMenu && !isClickOnToggle && navMenu.classList.contains('active')) {
      navMenu.classList.remove('active');
      mobileMenuToggle.classList.remove('active');
      mobileMenuToggle.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    }
  });
}

// ==================== SMOOTH SCROLL ====================
/**
 * Enable smooth scrolling for anchor links
 */
function initSmoothScroll() {
  // Get all links with hash
  const links = document.querySelectorAll('a[href^="#"]');

  links.forEach(link => {
    link.addEventListener('click', function(e) {
      const href = this.getAttribute('href');

      // Skip if it's just "#" or if the target doesn't exist
      if (href === '#' || href === '#!' || href.length <= 1) return;

      const target = document.querySelector(href);
      if (!target) return;

      e.preventDefault();

      // Get header height for offset
      const header = document.querySelector('.site-header');
      const headerHeight = header ? header.offsetHeight : 0;

      // Calculate position
      const targetPosition = target.getBoundingClientRect().top + window.pageYOffset;
      const offsetPosition = targetPosition - headerHeight - 20; // 20px extra padding

      // Smooth scroll to target
      window.scrollTo({
        top: offsetPosition,
        behavior: 'smooth'
      });

      // Update focus for accessibility
      target.focus({ preventScroll: true });
    });
  });
}

// ==================== SCROLL ANIMATIONS ====================
/**
 * Animate elements on scroll using Intersection Observer
 */
function initScrollAnimations() {
  // Get all elements with fade-in class
  const animatedElements = document.querySelectorAll('.fade-in');

  if (animatedElements.length === 0) return;

  // Create intersection observer
  const observerOptions = {
    root: null,
    rootMargin: '0px',
    threshold: 0.1 // Trigger when 10% of element is visible
  };

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        // Add visible class to trigger animation
        entry.target.classList.add('visible');

        // Stop observing this element (animation only happens once)
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  // Observe all animated elements
  animatedElements.forEach(element => {
    observer.observe(element);
  });
}

// ==================== HEADER SCROLL EFFECT ====================
/**
 * Add shadow to header when scrolling down
 */
function initHeaderScroll() {
  const header = document.querySelector('.site-header');
  if (!header) return;

  let lastScrollTop = 0;

  window.addEventListener('scroll', function() {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    // Add scrolled class when scrolled down more than 50px
    if (scrollTop > 50) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }

    lastScrollTop = scrollTop;
  });
}

// ==================== ACTIVE NAV LINKS ====================
/**
 * Highlight active navigation link based on current page
 */
function initActiveNavLinks() {
  const navLinks = document.querySelectorAll('.nav-link');
  const currentPath = window.location.pathname;

  navLinks.forEach(link => {
    const linkPath = new URL(link.href).pathname;

    // Check if this link matches current page
    if (linkPath === currentPath ||
        (currentPath === '/' && linkPath === '/index.html') ||
        (currentPath === '/index.html' && linkPath === '/')) {
      link.classList.add('active');
    }
  });
}

// ==================== UTILITY FUNCTIONS ====================

/**
 * Debounce function to limit how often a function can run
 * Useful for scroll and resize events
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

/**
 * Get URL parameters
 * Example: getUrlParameter('package') returns 'starter' from ?package=starter
 */
function getUrlParameter(name) {
  name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
  const regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
  const results = regex.exec(location.search);
  return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}

// ==================== EXPORT FOR DEBUGGING ====================
// Expose functions to window object for debugging (remove in production if desired)
if (typeof window !== 'undefined') {
  window.JovelCreative = {
    debounce,
    getUrlParameter
  };
}
