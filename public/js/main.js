document.addEventListener('DOMContentLoaded', () => {

    // Enhanced Theme toggle functionality with improved animations
    const themeBtn = document.getElementById('theme-btn');
    const body = document.body;
    const themeIcon = themeBtn.querySelector('.theme-icon');

    const savedTheme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
    body.setAttribute('data-theme', savedTheme);
    updateThemeIcon(savedTheme);

    themeBtn.addEventListener('click', () => {
        const currentTheme = body.getAttribute('data-theme');
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        
        // Add switching animation class
        themeBtn.classList.add('switching');
        
        // Change theme with a slight delay for animation
        setTimeout(() => {
            body.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeIcon(newTheme);
        }, 300);
        
        // Remove animation class
        setTimeout(() => {
            themeBtn.classList.remove('switching');
        }, 600);
        
        // Add visual feedback to page
        createThemeTransition(newTheme);
    });

    function updateThemeIcon(theme) {
        const newIcon = theme === 'light' ? 'fas fa-moon' : 'fas fa-sun';
        themeIcon.className = `${newIcon} theme-icon`;
        
        // Update tooltip text
        const tooltip = themeBtn.querySelector('.theme-tooltip');
        tooltip.textContent = `Switch to ${theme === 'light' ? 'dark' : 'light'} mode`;
    }

    function createThemeTransition(newTheme) {
        // Create a subtle overlay effect during transition
        const overlay = document.createElement('div');
        overlay.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: ${newTheme === 'dark' ? '#0f172a' : '#f8fafc'};
            opacity: 0;
            pointer-events: none;
            z-index: 9999;
            transition: opacity 0.3s ease;
        `;
        
        document.body.appendChild(overlay);
        
        // Fade in and out
        requestAnimationFrame(() => {
            overlay.style.opacity = '0.1';
            setTimeout(() => {
                overlay.style.opacity = '0';
                setTimeout(() => overlay.remove(), 300);
            }, 100);
        });
    }

    // Listen for system theme changes
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
        if (!localStorage.getItem('theme')) {
            const systemTheme = e.matches ? 'dark' : 'light';
            body.setAttribute('data-theme', systemTheme);
            updateThemeIcon(systemTheme);
        }
    });

    // Keyboard shortcut for theme toggle (Ctrl/Cmd + Shift + T)
    document.addEventListener('keydown', (e) => {
        if ((e.ctrlKey || e.metaKey) && e.shiftKey && e.key === 'T') {
            e.preventDefault();
            themeBtn.click();
        }
    });

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

    // Enhanced form submission with animations
    const converterForm = document.getElementById('converter-form');
    const convertBtn = document.getElementById('convert-btn');
    
    if (converterForm && convertBtn) {
        converterForm.addEventListener('submit', handleFormSubmission);
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
    
    // Enhanced copy to clipboard with feedback
    window.copyToClipboard = function(text, button) {
        // Get the button element if not passed
        if (!button) {
            button = event.target.closest('.copy-btn');
        }
        
        navigator.clipboard.writeText(text).then(() => {
            showCopyFeedback(button, text);
        }).catch(err => {
            // Fallback for older browsers
            fallbackCopyToClipboard(text, button);
        });
    };

    function showCopyFeedback(button, copiedText) {
        const originalIcon = button.querySelector('i');
        const tooltip = button.querySelector('.copy-tooltip');
        
        // Store original states
        const originalIconClass = originalIcon.className;
        const originalTooltipText = tooltip.textContent;
        
        // Update button appearance
        button.classList.add('copied');
        originalIcon.className = 'fas fa-check';
        tooltip.textContent = 'Copied!';
        
        // Show toast notification
        showCopyToast(copiedText);
        
        // Create success particles
        createCopyParticles(button);
        
        // Restore original state after delay
        setTimeout(() => {
            button.classList.remove('copied');
            originalIcon.className = originalIconClass;
            tooltip.textContent = originalTooltipText;
        }, 2000);
    }

    function showCopyToast(text) {
        // Remove any existing toast
        const existingToast = document.querySelector('.copy-toast');
        if (existingToast) {
            existingToast.remove();
        }
        
        // Create toast element
        const toast = document.createElement('div');
        toast.className = 'copy-toast';
        toast.setAttribute('role', 'alert');
        toast.setAttribute('aria-live', 'polite');
        toast.innerHTML = `
            <i class="fas fa-check-circle" aria-hidden="true"></i>
            <span>Copied to clipboard!</span>
            <div class="copied-text">${text.length > 20 ? text.substring(0, 20) + '...' : text}</div>
        `;
        
        document.body.appendChild(toast);
        
        // Trigger animation
        requestAnimationFrame(() => {
            toast.classList.add('show');
        });
        
        // Remove toast after delay
        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    function createCopyParticles(button) {
        const rect = button.getBoundingClientRect();
        const centerX = rect.left + rect.width / 2;
        const centerY = rect.top + rect.height / 2;
        
        for (let i = 0; i < 6; i++) {
            const particle = document.createElement('div');
            particle.className = 'copy-particle';
            particle.style.left = centerX + 'px';
            particle.style.top = centerY + 'px';
            
            const angle = (i / 6) * Math.PI * 2;
            const velocity = 30 + Math.random() * 20;
            const vx = Math.cos(angle) * velocity;
            const vy = Math.sin(angle) * velocity;
            
            particle.style.setProperty('--vx', vx + 'px');
            particle.style.setProperty('--vy', vy + 'px');
            
            document.body.appendChild(particle);
            
            setTimeout(() => particle.remove(), 1500);
        }
    }

    function fallbackCopyToClipboard(text, button) {
        // Fallback for older browsers
        const textArea = document.createElement('textarea');
        textArea.value = text;
        textArea.style.position = 'fixed';
        textArea.style.left = '-999999px';
        textArea.style.top = '-999999px';
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        
        try {
            document.execCommand('copy');
            showCopyFeedback(button, text);
        } catch (err) {
            console.error('Fallback copy failed:', err);
            showCopyError(button);
        } finally {
            document.body.removeChild(textArea);
        }
    }

    function showCopyError(button) {
        const tooltip = button.querySelector('.copy-tooltip');
        const originalText = tooltip.textContent;
        
        tooltip.textContent = 'Copy failed';
        tooltip.style.color = 'var(--accent-error)';
        
        setTimeout(() => {
            tooltip.textContent = originalText;
            tooltip.style.color = '';
        }, 2000);
    }
    
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
    initializeResultAnimation();
    initializeScrollAnimations();
    addCustomScrollAnimations();
    
    // Reset button state on page load
    resetButtonState();
    
    // Check if we have a result to animate
    const resultContainer = document.querySelector('.result-section');
    if (resultContainer) {
        console.log('Result container found, initializing...');
        
        const resultCard = resultContainer.querySelector('.result-card');
        if (resultCard) {
            console.log('Result card found, showing with animations...');
            
            // Force the built-in animation to start
            setTimeout(() => {
                resultCard.style.animation = 'none';
                resultCard.offsetHeight; // Force reflow
                resultCard.style.animation = 'resultSlideIn 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards';
            }, 100);
            
            // Start typing animation for the result value after card appears
            setTimeout(() => {
                const resultValue = resultContainer.querySelector('.result-value');
                if (resultValue) {
                    startTypingAnimation(resultValue);
                }
                
                // Add success particles if it's a successful conversion
                if (resultContainer.querySelector('.success-card')) {
                    setTimeout(() => {
                        createSuccessParticles(resultContainer);
                    }, 500);
                }
            }, 400);
        }
    }

    // Modal handling
    document.querySelectorAll('.modal-link').forEach(link => {
        link.addEventListener('click', e => {
            e.preventDefault();
            const id = link.dataset.modal;
            const modal = document.getElementById(id);
            if (modal) modal.style.display = 'flex';
        });
    });
    document.querySelectorAll('.modal-close').forEach(btn => {
        btn.addEventListener('click', () => btn.closest('.modal-overlay').style.display = 'none');
    });
    window.addEventListener('click', e => {
        if (e.target.classList.contains('modal-overlay')) {
            e.target.style.display = 'none';
        }
    });

    // PWA Install Prompt Listener
    window.addEventListener('beforeinstallprompt', (e) => {
        // Log that the browser is ready to install. This is the key event.
        console.log('✅ SUCCESS: PWA is installable. The "beforeinstallprompt" event was fired.');
        console.log('The browser should now be showing an install icon in the URL bar.');
        // Don't prevent default, let the browser show its own install UI
    });

    window.addEventListener('appinstalled', () => {
        console.log('🎉 SUCCESS: PWA was installed.');
    });
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

function initializeResultAnimation() {
    const resultValue = document.querySelector('.result-value');
    if (resultValue && resultValue.textContent.trim()) {
        startTypingAnimation(resultValue);
    }
}

function startTypingAnimation(element) {
    const text = element.textContent.trim();
    const isError = element.closest('.error-card');
    
    // Store original text in data attribute
    element.setAttribute('data-text', text);
    
    // Add typing class and start animation
    element.classList.add('typing');
    
    // Calculate typing speed based on text length
    const typingSpeed = Math.max(1.5, Math.min(3, text.length / 10));
    
    // Update CSS animation duration
    const style = document.createElement('style');
    style.textContent = `
        .result-value.typing::before,
        .result-value.typing::after {
            animation-duration: ${typingSpeed}s, 1s;
            animation-delay: 0s, ${typingSpeed}s;
        }
    `;
    document.head.appendChild(style);
    
    // Remove typing class after animation completes
    setTimeout(() => {
        element.classList.remove('typing');
        document.head.removeChild(style);
        
        // Add a subtle pulse effect for success
        if (!isError) {
            element.style.animation = 'pulse 0.6s ease-out';
            setTimeout(() => {
                element.style.animation = '';
                createSuccessParticles(element);
            }, 600);
        }
         }, (typingSpeed * 1000) + 500);
}

function handleFormSubmission(e) {
    const convertBtn = document.getElementById('convert-btn');
    const btnText = convertBtn.querySelector('.btn-text');
    const btnLoader = convertBtn.querySelector('.btn-loader');
    const hexInput = document.getElementById('hex_uid');
    
    console.log('Form submission started');
    console.log('Hex input value:', hexInput.value);
    
    // Validate input before submission
    if (!hexInput.value.trim()) {
        e.preventDefault();
        hexInput.focus();
        showValidation(false, 'Please enter a hexadecimal UID');
        return;
    }
    
    // Validate hex format
    const cleanHex = hexInput.value.replace(/[^0-9A-Fa-f]/g, '');
    if (cleanHex.length < 8 || cleanHex.length % 2 !== 0) {
        e.preventDefault();
        showValidation(false, 'Please enter a valid hexadecimal UID (at least 4 bytes)');
        return;
    }
    
    // Add loading state
    convertBtn.classList.add('loading');
    convertBtn.disabled = true;
    
    // Hide existing result if any
    const existingResult = document.querySelector('.result-section');
    if (existingResult) {
        existingResult.style.opacity = '0';
        existingResult.style.transform = 'translateY(-20px)';
    }
    
    // Store form submission state
    sessionStorage.setItem('formSubmitted', 'true');
    
    console.log('Form will submit normally');
    // The form will submit normally, but we've added visual feedback
}

function resetButtonState() {
    const convertBtn = document.getElementById('convert-btn');
    if (convertBtn) {
        convertBtn.classList.remove('loading');
        convertBtn.disabled = false;
    }
    
    // Clear form submission state
    sessionStorage.removeItem('formSubmitted');
}

function createSuccessParticles(element) {
    const rect = element.getBoundingClientRect();
    const centerX = rect.left + rect.width / 2;
    const centerY = rect.top + rect.height / 2;
    
    for (let i = 0; i < 8; i++) {
        const particle = document.createElement('div');
        particle.className = 'celebration-particle';
        particle.style.left = centerX + 'px';
        particle.style.top = centerY + 'px';
        
        const angle = (i / 8) * Math.PI * 2;
        const velocity = 50 + Math.random() * 30;
        const vx = Math.cos(angle) * velocity;
        const vy = Math.sin(angle) * velocity;
        
        particle.style.setProperty('--vx', vx + 'px');
        particle.style.setProperty('--vy', vy + 'px');
        
        document.body.appendChild(particle);
        
        setTimeout(() => particle.remove(), 3000);
    }
}

// Enhanced Scroll Animation System
function initializeScrollAnimations() {
    // Check for reduced motion preference
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) return;

    // Initialize AOS (Animate On Scroll) system
    const observerOptions = {
        threshold: 0.15,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const element = entry.target;
                const delay = element.dataset.aosDelay || 0;
                
                setTimeout(() => {
                    element.classList.add('aos-animate');
                }, parseInt(delay));
                
                // Stop observing once animated
                observer.unobserve(element);
            }
        });
    }, observerOptions);

    // Observe all elements with data-aos attribute (except result sections)
    document.querySelectorAll('[data-aos]').forEach(element => {
        // Skip result sections and their children
        if (!element.closest('.result-section') && !element.classList.contains('result-section')) {
            observer.observe(element);
        }
    });

    // Auto-add animations to common elements if not manually specified
    autoAddScrollAnimations();
}

function autoAddScrollAnimations() {
    // Add animations to section titles (but skip result sections)
    document.querySelectorAll('.section-title').forEach((title, index) => {
        if (!title.hasAttribute('data-aos') && !title.closest('.result-section')) {
            title.setAttribute('data-aos', 'fade-up');
            title.setAttribute('data-aos-delay', (index * 100).toString());
        }
    });

    // Add animations to cards with staggered timing
    document.querySelectorAll('.about-card').forEach((card, index) => {
        if (!card.hasAttribute('data-aos')) {
            card.setAttribute('data-aos', 'card-lift');
            card.setAttribute('data-aos-delay', (index * 150).toString());
        }
    });

    document.querySelectorAll('.feature-item').forEach((item, index) => {
        if (!item.hasAttribute('data-aos')) {
            item.setAttribute('data-aos', 'fade-left');
            item.setAttribute('data-aos-delay', (index * 100).toString());
        }
    });

    // Add animations to info section
    const infoCard = document.querySelector('.info-card');
    if (infoCard && !infoCard.hasAttribute('data-aos')) {
        infoCard.setAttribute('data-aos', 'zoom-in');
    }

    // Add animations to examples
    document.querySelectorAll('.example-item').forEach((item, index) => {
        if (!item.hasAttribute('data-aos')) {
            item.setAttribute('data-aos', 'flip-up');
            item.setAttribute('data-aos-delay', (index * 200).toString());
        }
    });

    // Add animations to donate section
    const donateDescription = document.querySelector('.donate-description');
    if (donateDescription && !donateDescription.hasAttribute('data-aos')) {
        donateDescription.setAttribute('data-aos', 'fade-up');
    }

    document.querySelectorAll('.donate-btn').forEach((btn, index) => {
        if (!btn.hasAttribute('data-aos')) {
            btn.setAttribute('data-aos', 'bounce-in');
            btn.setAttribute('data-aos-delay', (index * 150).toString());
        }
    });
}

// Custom scroll animations for specific elements
function addCustomScrollAnimations() {
    // Animate navbar on scroll
    let lastScrollY = window.scrollY;
    
    window.addEventListener('scroll', () => {
        const currentScrollY = window.scrollY;
        const navbar = document.querySelector('.navbar');
        
        if (currentScrollY > lastScrollY && currentScrollY > 100) {
            // Scrolling down - hide navbar
            navbar.style.transform = 'translateY(-100%)';
        } else {
            // Scrolling up - show navbar
            navbar.style.transform = 'translateY(0)';
        }
        
        lastScrollY = currentScrollY;
    });

    // Parallax effect for background elements
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.background-pattern, .wave-container');
        
        parallaxElements.forEach(element => {
            const speed = 0.5;
            element.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });
} 