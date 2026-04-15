/**
 * Form Validation & Enhancement
 * Client-side validation for contact form
 */

document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.querySelector('form[action*="admin-post"]');

    if (contactForm) {
        // Form validation
        contactForm.addEventListener('submit', function(e) {
            const name = document.querySelector('input[name="full_name"]');
            const email = document.querySelector('input[name="email"]');
            const message = document.querySelector('textarea[name="message"]');

            let isValid = true;
            const errors = [];

            // Name validation
            if (!name.value.trim() || name.value.trim().length < 3) {
                errors.push('Name must be at least 3 characters long');
                name.classList.add('border-red-500', 'focus:ring-red-500');
                isValid = false;
            } else {
                name.classList.remove('border-red-500', 'focus:ring-red-500');
            }

            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value)) {
                errors.push('Please enter a valid email address');
                email.classList.add('border-red-500', 'focus:ring-red-500');
                isValid = false;
            } else {
                email.classList.remove('border-red-500', 'focus:ring-red-500');
            }

            // Message validation
            if (!message.value.trim() || message.value.trim().length < 10) {
                errors.push('Message must be at least 10 characters long');
                message.classList.add('border-red-500', 'focus:ring-red-500');
                isValid = false;
            } else {
                message.classList.remove('border-red-500', 'focus:ring-red-500');
            }

            if (!isValid) {
                e.preventDefault();
                showValidationErrors(errors);
            }
        });

        // Real-time validation feedback
        document.querySelector('input[name="full_name"]')?.addEventListener('blur', function() {
            if (this.value.trim().length >= 3) {
                this.classList.remove('border-red-500');
                this.classList.add('border-green-500');
            }
        });

        document.querySelector('input[name="email"]')?.addEventListener('blur', function() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (emailRegex.test(this.value)) {
                this.classList.remove('border-red-500');
                this.classList.add('border-green-500');
            }
        });
    }

    function showValidationErrors(errors) {
        // Remove existing error message
        const existing = document.querySelector('.validation-error-message');
        if (existing) existing.remove();

        // Create and show error message
        const errorDiv = document.createElement('div');
        errorDiv.className = 'validation-error-message bg-red-900/40 border border-red-400/30 text-red-300 rounded-lg p-6 mb-8 font-medium';
        errorDiv.innerHTML = '❌ Please fix the following errors:<br>' + errors.map(e => '• ' + e).join('<br>');

        const form = document.querySelector('form[action*="admin-post"]');
        form.parentNode.insertBefore(errorDiv, form);

        // Scroll to error
        errorDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
});
