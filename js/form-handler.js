/**
 * JOVEL CREATIVE - CONTACT FORM HANDLER
 * Form validation and submission handling
 *
 * SETUP INSTRUCTIONS:
 * 1. Sign up for Formspree at https://formspree.io (free tier)
 * 2. Create a new form in your Formspree dashboard
 * 3. Copy your form ID
 * 4. In contact.html, replace "YOUR_FORM_ID" in the form action with your actual ID
 * 5. Test the form to ensure submissions are received
 */

// ==================== WAIT FOR DOM LOAD ====================
document.addEventListener('DOMContentLoaded', function() {
  const contactForm = document.getElementById('contact-form');

  if (contactForm) {
    initContactForm(contactForm);
  }
});

// ==================== FORM INITIALIZATION ====================

/**
 * Initialize contact form with validation and submission handling
 */
function initContactForm(form) {
  // Real-time validation on blur
  const inputs = form.querySelectorAll('input, textarea, select');
  inputs.forEach(input => {
    input.addEventListener('blur', function() {
      validateField(this);
    });

    // Clear error on focus
    input.addEventListener('focus', function() {
      clearFieldError(this);
    });
  });

  // Handle form submission
  form.addEventListener('submit', handleFormSubmit);

  // Pre-fill package if coming from URL parameter
  prefillPackageField(form);
}

// ==================== FORM VALIDATION ====================

/**
 * Validate individual field
 */
function validateField(field) {
  const fieldGroup = field.closest('.form-group');
  const value = field.value.trim();
  let isValid = true;
  let errorMessage = '';

  // Required field validation
  if (field.hasAttribute('required') && value === '') {
    isValid = false;
    errorMessage = 'This field is required';
  }

  // Email validation
  if (field.type === 'email' && value !== '') {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(value)) {
      isValid = false;
      errorMessage = 'Please enter a valid email address';
    }
  }

  // Phone validation (optional but format check if provided)
  if (field.type === 'tel' && value !== '') {
    // Remove common formatting characters
    const cleanPhone = value.replace(/[\s\-\(\)\.]/g, '');
    if (cleanPhone.length < 10) {
      isValid = false;
      errorMessage = 'Please enter a valid phone number';
    }
  }

  // URL validation (optional but format check if provided)
  if (field.type === 'url' && value !== '') {
    try {
      new URL(value);
    } catch (e) {
      // If URL needs http/https prefix, try adding it
      if (!value.startsWith('http://') && !value.startsWith('https://')) {
        try {
          new URL('https://' + value);
          field.value = 'https://' + value; // Auto-correct the URL
        } catch (e) {
          isValid = false;
          errorMessage = 'Please enter a valid URL';
        }
      } else {
        isValid = false;
        errorMessage = 'Please enter a valid URL';
      }
    }
  }

  // Update UI
  if (!isValid) {
    showFieldError(fieldGroup, errorMessage);
  } else {
    clearFieldError(field);
  }

  return isValid;
}

/**
 * Validate entire form
 */
function validateForm(form) {
  const requiredFields = form.querySelectorAll('[required]');
  let isValid = true;

  requiredFields.forEach(field => {
    if (!validateField(field)) {
      isValid = false;
    }
  });

  return isValid;
}

/**
 * Show field error
 */
function showFieldError(fieldGroup, message) {
  fieldGroup.classList.add('error');
  const errorElement = fieldGroup.querySelector('.form-error');
  if (errorElement && message) {
    errorElement.textContent = message;
  }
}

/**
 * Clear field error
 */
function clearFieldError(field) {
  const fieldGroup = field.closest('.form-group');
  if (fieldGroup) {
    fieldGroup.classList.remove('error');
  }
}

// ==================== FORM SUBMISSION ====================

/**
 * Handle form submission
 */
async function handleFormSubmit(e) {
  e.preventDefault();

  const form = e.target;
  const submitButton = form.querySelector('button[type="submit"]');
  const successMessage = document.getElementById('form-success');
  const errorMessage = document.getElementById('form-error');

  // Hide any previous messages
  successMessage.style.display = 'none';
  errorMessage.style.display = 'none';

  // Validate form
  if (!validateForm(form)) {
    // Scroll to first error
    const firstError = form.querySelector('.form-group.error');
    if (firstError) {
      firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
    return;
  }

  // Disable submit button to prevent double submission
  const originalButtonText = submitButton.innerHTML;
  submitButton.disabled = true;
  submitButton.innerHTML = 'Sending...';

  try {
    // Get form data
    const formData = new FormData(form);

    // Submit to Formspree
    const response = await fetch(form.action, {
      method: 'POST',
      body: formData,
      headers: {
        'Accept': 'application/json'
      }
    });

    if (response.ok) {
      // Success!
      successMessage.style.display = 'block';
      form.reset();

      // Track form submission in Google Analytics
      if (typeof window.trackFormSubmission === 'function') {
        window.trackFormSubmission('contact-form', {
          'business_type': formData.get('business-type') || 'not specified',
          'budget': formData.get('budget') || 'not specified',
          'referral_source': formData.get('referral') || 'not specified'
        });
      }

      // Scroll to success message
      successMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });

      // Optional: Redirect to thank you page after 3 seconds
      // setTimeout(() => {
      //   window.location.href = '/thank-you.html';
      // }, 3000);

    } else {
      // Server error
      throw new Error('Form submission failed');
    }

  } catch (error) {
    // Show error message
    errorMessage.style.display = 'block';
    errorMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });

    console.error('Form submission error:', error);
  } finally {
    // Re-enable submit button
    submitButton.disabled = false;
    submitButton.innerHTML = originalButtonText;
  }
}

// ==================== UTILITY FUNCTIONS ====================

/**
 * Pre-fill package field if coming from URL parameter
 * Example: /contact.html?package=starter
 */
function prefillPackageField(form) {
  const urlParams = new URLSearchParams(window.location.search);
  const packageParam = urlParams.get('package');

  if (packageParam) {
    // Try to select the budget range based on package
    const budgetSelect = form.querySelector('#budget');
    if (budgetSelect) {
      if (packageParam === 'starter') {
        budgetSelect.value = '2000-3000';
      } else if (packageParam === 'professional') {
        budgetSelect.value = '3000-5000';
      } else if (packageParam === 'premium') {
        budgetSelect.value = '5000+';
      }
    }

    // Optionally pre-fill a message
    const messageField = form.querySelector('#message');
    if (messageField && messageField.value === '') {
      const packageNames = {
        'starter': 'Starter Package',
        'professional': 'Professional Package',
        'premium': 'Premium Package'
      };
      const packageName = packageNames[packageParam] || packageParam;
      messageField.value = `I'm interested in the ${packageName}. `;
      messageField.focus();
      // Move cursor to end
      messageField.setSelectionRange(messageField.value.length, messageField.value.length);
    }
  }
}

/**
 * Sanitize form input (remove potentially harmful characters)
 */
function sanitizeInput(input) {
  const div = document.createElement('div');
  div.textContent = input;
  return div.innerHTML;
}

// ==================== EXPORT FOR DEBUGGING ====================
if (typeof window !== 'undefined') {
  window.FormHandler = {
    validateForm,
    validateField
  };
}
