document.addEventListener('DOMContentLoaded', () => {

    // Enhanced Theme toggle functionality
    const themeBtn = document.getElementById('theme-btn');
    const body = document.body;
    const themeIcon = themeBtn.querySelector('i');

    const savedTheme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
    body.setAttribute('data-theme', savedTheme);
    updateThemeIcon(savedTheme);

    themeBtn.addEventListener('click', () => {
        const newTheme = body.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
        body.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        updateThemeIcon(newTheme);
        themeBtn.style.transform = 'rotate(360deg) scale(1.2)';
        setTimeout(() => themeBtn.style.transform = 'rotate(0deg) scale(1)', 500);
    });

    function updateThemeIcon(theme) {
        themeIcon.className = theme === 'light' ? 'fas fa-moon' : 'fas fa-sun';
    }

    // Navigation functionality
    const navToggle = document.getElementById('nav-toggle');
    const navMenu = document.getElementById('nav-menu');
    navToggle.addEventListener('click', () => {
        navMenu.classList.toggle('active');
        navToggle.classList.toggle('active');
    });

    window.addEventListener('scroll', () => {
        const navbar = document.querySelector('.navbar');
        navbar.classList.toggle('scrolled', window.scrollY > 50);
    });

    // Online/Offline status
    const statusIndicator = document.getElementById('status-indicator');
    const statusText = document.getElementById('status-text');

    function updateOnlineStatus() {
        if (navigator.onLine) {
            statusIndicator.className = 'status-indicator online';
            statusText.textContent = 'Online';
        } else {
            statusIndicator.className = 'status-indicator offline';
            statusText.textContent = 'Offline';
        }
    }
    window.addEventListener('online', updateOnlineStatus);
    window.addEventListener('offline', updateOnlineStatus);
    updateOnlineStatus();

    // Crypto addresses modal
    window.showCryptoAddresses = function() {
        const cryptoDiv = document.getElementById('crypto-addresses');
        cryptoDiv.style.display = cryptoDiv.style.display === 'none' ? 'block' : 'none';
    };

    // Enhanced Form validation
    const hexInput = document.getElementById('hex_uid');
    const feedback = document.querySelector('.input-feedback');
    const validationIcon = document.querySelector('.validation-icon');
    const inputWrapper = document.querySelector('.input-wrapper');

    if (hexInput) {
        hexInput.addEventListener('input', validateInput);
        hexInput.addEventListener('focus', () => inputWrapper.classList.add('focused'));
        hexInput.addEventListener('blur', () => inputWrapper.classList.remove('focused'));
    }

    function validateInput() {
        const value = hexInput.value.trim();
        if (value === '') return resetValidation();
        const hexPattern = /^[0-9a-fA-F:]+$/;
        showValidation(hexPattern.test(value), hexPattern.test(value) ? 'Valid hexadecimal format' : 'Invalid format. Use only 0-9, A-F and colons.');
    }

    function showValidation(isValid, message) {
        inputWrapper.classList.remove('valid', 'invalid');
        inputWrapper.classList.add(isValid ? 'valid' : 'invalid');
        feedback.textContent = message;
        feedback.className = `input-feedback ${isValid ? 'success' : 'error'}`;
    }

    function resetValidation() {
        inputWrapper.classList.remove('valid', 'invalid');
        feedback.textContent = '';
    }

    // Ripple effect for buttons
    document.querySelectorAll('.convert-btn, .donate-btn').forEach(button => {
        button.addEventListener('click', e => createRipple(e, button));
    });

    function createRipple(event, button) {
        const ripple = document.createElement('span');
        ripple.className = 'ripple-effect';
        const rect = button.getBoundingClientRect();
        ripple.style.left = `${event.clientX - rect.left}px`;
        ripple.style.top = `${event.clientY - rect.top}px`;
        button.appendChild(ripple);
        setTimeout(() => ripple.remove(), 600);
    }
    
    // Copy to clipboard
    window.copyToClipboard = function(text) {
        navigator.clipboard.writeText(text).then(() => {
            // You can add a tooltip or other feedback here
        });
    };
    
    // Fill example
    window.fillExample = function(value) {
        hexInput.value = value;
        validateInput();
        hexInput.focus();
    };

    // Service Worker registration
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('/service-worker.js').catch(err => console.error('ServiceWorker registration failed:', err));
        });
    }

    // Initial animations
    document.body.classList.add('loaded');
    animateTitle();
    createFloatingParticles();
});

function animateTitle() {
    document.querySelectorAll('.title-letter').forEach((letter, index) => {
        letter.style.animationDelay = `${index * 0.05}s`;
        letter.classList.add('letter-bounce');
    });
}

function createFloatingParticles() {
    const container = document.querySelector('.particles-container');
    if (!container) return;
    for (let i = 0; i < 10; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.left = `${Math.random() * 100}%`;
        particle.style.animationDuration = `${Math.random() * 10 + 10}s`;
        particle.style.animationDelay = `${Math.random() * 5}s`;
        container.appendChild(particle);
    }
} 