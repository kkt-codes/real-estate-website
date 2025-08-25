document.addEventListener('DOMContentLoaded', function() {
    // 1. Form validation
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function(event) {
        const name = document.getElementById('name').value;
        const phone = document.getElementById('phone').value;
        const email = document.getElementById('email').value;
        const message = document.getElementById('message').value;
        
        // Custom validation for required fields
        if (!name || !phone || !email || !message) {
            event.preventDefault(); // Prevent form submission
            alert('Please fill out all fields before submitting.');
        }
    });
    
    // 2. Email and phone validation
    const emailInput = document.getElementById('email');
    
    emailInput.addEventListener('input', function() {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(emailInput.value)) {
            // Display error message or change border color
            emailInput.style.borderColor = 'red';
        } else {
            emailInput.style.borderColor = '';
        }
    });

    phoneInput.addEventListener('input', function() {
        const phonePattern = /^\d{3}-\d{3}-\d{4}$/;
        if (!phonePattern.test(phoneInput.value)) {
            phoneInput.style.borderColor = 'red';
        } else {
            phoneInput.style.borderColor = '';
        }
    });
});
