<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NFC UID Converter - Modern RFID Tool</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="manifest" href="manifest.json">
    <meta name="theme-color" content="#3b82f6">
</head>
<body>
    <!-- Navigation Header -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-brand">
                <i class="fas fa-wifi nav-icon"></i>
                <span class="nav-title">UID Converter</span>
            </div>
            
            <div class="nav-menu" id="nav-menu">
                <a href="#home" class="nav-link active">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
                <a href="#about" class="nav-link">
                    <i class="fas fa-info-circle"></i>
                    <span>About</span>
                </a>
                <a href="#features" class="nav-link">
                    <i class="fas fa-star"></i>
                    <span>Features</span>
                </a>
                <a href="#donate" class="nav-link">
                    <i class="fas fa-heart"></i>
                    <span>Donate</span>
                </a>
            </div>
            
            <div class="nav-actions">
                <button class="nav-toggle" id="nav-toggle" aria-label="Toggle navigation">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Floating Particles Background -->
    <div class="particles-container">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- Animated Background Waves -->
    <div class="wave-container">
        <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="wave-fill"></path>
        </svg>
        <svg class="wave wave-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="wave-fill"></path>
        </svg>
    </div>

    <div class="theme-toggle">
        <button id="theme-btn" class="theme-btn" aria-label="Toggle theme">
            <i class="fas fa-moon"></i>
            <span class="theme-tooltip">Toggle Theme</span>
        </button>
    </div>

    <div class="background-pattern"></div>
    
    <!-- Main Content -->
    <main class="main-content">
        <!-- Hero + Converter Section -->
        <section id="home" class="hero-section">
            <div class="container">
                <div class="hero-container">
                    <div class="header">
                        <div class="icon-wrapper">
                            <i class="fas fa-wifi icon-main"></i>
                            <div class="icon-rings">
                                <div class="ring ring-1"></div>
                                <div class="ring ring-2"></div>
                                <div class="ring ring-3"></div>
                            </div>
                        </div>
                        <h1 class="title">
                            <span class="title-letter">N</span>
                            <span class="title-letter">F</span>
                            <span class="title-letter">C</span>
                            <span class="title-space"> </span>
                            <span class="title-letter">U</span>
                            <span class="title-letter">I</span>
                            <span class="title-letter">D</span>
                            <span class="title-space"> </span>
                            <span class="title-letter">C</span>
                            <span class="title-letter">o</span>
                            <span class="title-letter">n</span>
                            <span class="title-letter">v</span>
                            <span class="title-letter">e</span>
                            <span class="title-letter">r</span>
                            <span class="title-letter">t</span>
                            <span class="title-letter">e</span>
                            <span class="title-letter">r</span>
                        </h1>
                        <p class="subtitle">Convert NFC/RFID hexadecimal UIDs to decimal format</p>
                    </div>

                    <div class="converter-card">
                <div class="card-glow"></div>
                <form method="POST" action="convert.php" id="converter-form">
                    <div class="input-group">
                        <label for="hex_uid" class="input-label">
                            <i class="fas fa-hashtag"></i>
                            Hexadecimal UID
                        </label>
                        <div class="input-wrapper">
                            <div class="input-glow"></div>
                            <input type="text" 
                                   id="hex_uid" 
                                   name="hex_uid" 
                                   placeholder="e.g., 04:A1:B2:C3 or 04A1B2C3" 
                                   autocomplete="off"
                                   spellcheck="false">
                            <div class="input-validation">
                                <i class="fas fa-check validation-icon"></i>
                            </div>
                            <div class="typing-cursor"></div>
                        </div>
                        <div class="input-feedback"></div>
                    </div>

                    <button type="submit" name="submit" class="convert-btn" id="convert-btn">
                        <div class="btn-bg-animation"></div>
                        <span class="btn-text">Convert to Decimal</span>
                        <span class="btn-loader">
                            <div class="loader-spinner">
                                <div class="spinner-inner"></div>
                                <div class="spinner-inner"></div>
                                <div class="spinner-inner"></div>
                            </div>
                        </span>
                        <span class="btn-icon">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                        <div class="btn-ripple"></div>
                    </button>
                </form>

                <div class="result-section" id="result-container">
                    <?php
                    if (isset($_SESSION['result'])) {
                        $result = $_SESSION['result'];
                        
                        // Check if it's an error message
                        if (strpos($result, 'error') !== false || strpos($result, 'Error') !== false || strpos($result, 'Invalid') !== false) {
                            echo "<div class='result-card error-card animate-in'>";
                            echo "<div class='result-icon shake-animation'><i class='fas fa-exclamation-triangle'></i></div>";
                            echo "<div class='result-content'>" . $result . "</div>";
                            echo "</div>";
                        } else {
                            // Extract the decimal number from the result
                            preg_match('/Decimal ID: (\d+)/', $result, $matches);
                            $decimal_value = isset($matches[1]) ? $matches[1] : '';
                            
                            echo "<div class='result-card success-card animate-in'>";
                            echo "<div class='result-icon bounce-animation'><i class='fas fa-check-circle'></i></div>";
                            echo "<div class='result-content'>";
                            echo "<div class='result-label'>Decimal ID</div>";
                            echo "<div class='result-value counter-animation' id='decimal-result' data-target='" . $decimal_value . "'>0</div>";
                            echo "<button class='copy-btn pulse-on-hover' onclick='copyToClipboard(\"" . $decimal_value . "\")' title='Copy to clipboard'>";
                            echo "<i class='fas fa-copy'></i>";
                            echo "<span class='copy-tooltip'>Copy to clipboard</span>";
                            echo "</button>";
                            echo "</div>";
                            echo "</div>";
                        }
                        unset($_SESSION['result']);
                    }
                    ?>
                </div>
                </div>
            </div>
        </section>

        <!-- Info Section -->
        <section class="section">
            <div class="container">
                <div class="info-section">
                    <div class="info-card">
                        <div class="card-shine"></div>
                        <h3><i class="fas fa-info-circle"></i> How it works</h3>
                        <p>This tool converts NFC/RFID hexadecimal UIDs to decimal format by reversing the byte order and converting to decimal. Commonly used for access control systems and IoT applications.</p>
                    </div>
                    
                    <div class="examples">
                        <h4>Example formats:</h4>
                        <div class="example-list">
                            <div class="example-item hover-lift" onclick="fillExample('04:A1:B2:C3')">
                                <div class="example-glow"></div>
                                <code>04:A1:B2:C3</code>
                                <i class="fas fa-arrow-right arrow-bounce"></i>
                                <span class="result-preview">3286138884</span>
                            </div>
                            <div class="example-item hover-lift" onclick="fillExample('1A2B3C4D')">
                                <div class="example-glow"></div>
                                <code>1A2B3C4D</code>
                                <i class="fas fa-arrow-right arrow-bounce"></i>
                                <span class="result-preview">1296975114</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="section">
            <div class="container">
                <h2 class="section-title">About This Tool</h2>
                <div class="about-grid">
                    <div class="about-card">
                        <div class="about-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h3>Lightning Fast</h3>
                        <p>Instant conversion with real-time validation and beautiful animations.</p>
                    </div>
                    <div class="about-card">
                        <div class="about-icon">
                            <i class="fas fa-cloud-download-alt"></i>
                        </div>
                        <h3>Works Offline</h3>
                        <p>Progressive Web App technology ensures conversion works even without internet.</p>
                    </div>
                    <div class="about-card">
                        <div class="about-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3>Mobile Ready</h3>
                        <p>Responsive design works perfectly on phones, tablets, and desktops.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="section">
            <div class="container">
                <h2 class="section-title">Features</h2>
                <div class="features-list">
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Real-time hex validation</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Copy results with one click</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Dark and light themes</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Animated user interface</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Installable as mobile app</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Works completely offline</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Donation Section -->
        <section id="donate" class="section">
            <div class="container">
                <h2 class="section-title">Support This Project</h2>
                <div class="donate-content">
                    <p class="donate-description">
                        If this tool has been helpful to you, consider supporting its development and maintenance. 
                        Your support helps keep this tool free and continuously improved!
                    </p>
                    
                    <div class="donate-options">
                        <a href="https://www.buymeacoffee.com/example" target="_blank" class="donate-btn coffee-btn">
                            <i class="fas fa-coffee"></i>
                            <span>Buy me a coffee</span>
                        </a>
                        <a href="https://paypal.me/example" target="_blank" class="donate-btn paypal-btn">
                            <i class="fab fa-paypal"></i>
                            <span>PayPal</span>
                        </a>
                        <button class="donate-btn crypto-btn" onclick="showCryptoAddresses()">
                            <i class="fab fa-bitcoin"></i>
                            <span>Crypto</span>
                        </button>
                    </div>

                    <div class="crypto-addresses" id="crypto-addresses" style="display: none;">
                        <div class="crypto-item">
                            <span class="crypto-label">Bitcoin:</span>
                            <code class="crypto-address" onclick="copyToClipboard(this.textContent)">bc1qexampleaddress...</code>
                            <i class="fas fa-copy crypto-copy"></i>
                        </div>
                        <div class="crypto-item">
                            <span class="crypto-label">Ethereum:</span>
                            <code class="crypto-address" onclick="copyToClipboard(this.textContent)">0xexampleaddress...</code>
                            <i class="fas fa-copy crypto-copy"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>NFC UID Converter</h4>
                    <p>A modern, offline-capable tool for converting NFC/RFID UIDs between hexadecimal and decimal formats.</p>
                    <div class="footer-social">
                        <a href="https://github.com/example" target="_blank" aria-label="GitHub">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="https://twitter.com/example" target="_blank" aria-label="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="mailto:contact@example.com" aria-label="Email">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#donate">Donate</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4>Resources</h4>
                    <ul class="footer-links">
                        <li><a href="https://github.com/severusraj/nfc-rfid-converter" target="_blank">Documentation</a></li>
                        <li><a href="https://github.com/severusraj/nfc-rfid-converter/issues" target="_blank">Report Bug</a></li>
                        <li><a href="https://github.com/severusraj/nfc-rfid-converter/issues" target="_blank">Feature Request</a></li>
                        <li><a href="privacy.html">Privacy Policy</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4>Tech Stack</h4>
                    <div class="tech-stack">
                        <span class="tech-item">HTML5</span>
                        <span class="tech-item">CSS3</span>
                        <span class="tech-item">JavaScript</span>
                        <span class="tech-item">PHP</span>
                        <span class="tech-item">PWA</span>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 NFC UID Converter. Made with <i class="fas fa-heart"></i> for the IoT community.</p>
                <div class="footer-status">
                    <span class="status-indicator online" id="status-indicator">
                        <i class="fas fa-circle"></i>
                        <span id="status-text">Online</span>
                    </span>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Enhanced Theme toggle functionality with animation
        const themeBtn = document.getElementById('theme-btn');
        const body = document.body;
        const themeIcon = themeBtn.querySelector('i');

        // Check for saved theme or default to light
        const savedTheme = localStorage.getItem('theme') || 'light';
        body.setAttribute('data-theme', savedTheme);
        updateThemeIcon(savedTheme);

        themeBtn.addEventListener('click', () => {
            const currentTheme = body.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            
            // Add transition effect
            body.style.transition = 'all 0.5s ease';
            body.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeIcon(newTheme);
            
            // Animate theme button
            themeBtn.style.transform = 'rotate(360deg) scale(1.2)';
            setTimeout(() => {
                themeBtn.style.transform = 'rotate(0deg) scale(1)';
            }, 500);
        });

        function updateThemeIcon(theme) {
            themeIcon.className = theme === 'light' ? 'fas fa-moon' : 'fas fa-sun';
        }

        // Navigation functionality
        const navToggle = document.getElementById('nav-toggle');
        const navMenu = document.getElementById('nav-menu');
        const navLinks = document.querySelectorAll('.nav-link');

        navToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            navToggle.classList.toggle('active');
        });

        // Smooth scrolling for navigation links
        navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const targetId = link.getAttribute('href').substring(1);
                const targetSection = document.getElementById(targetId);
                
                if (targetSection) {
                    targetSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
                
                // Close mobile menu
                navMenu.classList.remove('active');
                navToggle.classList.remove('active');
                
                // Update active link
                navLinks.forEach(l => l.classList.remove('active'));
                link.classList.add('active');
            });
        });

        // Update active nav link on scroll
        window.addEventListener('scroll', () => {
            const sections = document.querySelectorAll('section[id]');
            const scrollPos = window.scrollY + 100;
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.offsetHeight;
                const sectionId = section.getAttribute('id');
                
                if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                    navLinks.forEach(link => {
                        link.classList.remove('active');
                        if (link.getAttribute('href') === `#${sectionId}`) {
                            link.classList.add('active');
                        }
                    });
                }
            });
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
        function showCryptoAddresses() {
            const cryptoDiv = document.getElementById('crypto-addresses');
            cryptoDiv.style.display = cryptoDiv.style.display === 'none' ? 'block' : 'none';
        }

        // Enhanced Form validation with animations
        const hexInput = document.getElementById('hex_uid');
        const feedback = document.querySelector('.input-feedback');
        const validationIcon = document.querySelector('.validation-icon');
        const inputWrapper = document.querySelector('.input-wrapper');
        const typingCursor = document.querySelector('.typing-cursor');

        hexInput.addEventListener('input', validateInput);
        hexInput.addEventListener('focus', () => {
            inputWrapper.classList.add('focused');
            typingCursor.classList.add('active');
        });
        hexInput.addEventListener('blur', () => {
            inputWrapper.classList.remove('focused');
            typingCursor.classList.remove('active');
        });

        function validateInput() {
            const value = hexInput.value.trim();
            const hexPattern = /^[0-9a-fA-F:]+$/;
            
            if (value === '') {
                resetValidation();
                return;
            }
            
            if (hexPattern.test(value)) {
                showValidation(true, 'Valid hexadecimal format');
                triggerSuccessAnimation();
            } else {
                showValidation(false, 'Invalid format. Use only hexadecimal characters (0-9, A-F) and colons.');
                triggerErrorAnimation();
            }
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
            feedback.className = 'input-feedback';
        }

        function triggerSuccessAnimation() {
            validationIcon.style.animation = 'none';
            setTimeout(() => {
                validationIcon.style.animation = 'checkmarkPop 0.6s ease-out';
            }, 10);
        }

        function triggerErrorAnimation() {
            inputWrapper.style.animation = 'none';
            setTimeout(() => {
                inputWrapper.style.animation = 'shakeError 0.5s ease-out';
            }, 10);
        }

        // Enhanced Form submission with ripple effect
        const form = document.getElementById('converter-form');
        const convertBtn = document.getElementById('convert-btn');

        convertBtn.addEventListener('click', (e) => {
            createRipple(e, convertBtn);
        });

        function createRipple(event, button) {
            const circle = document.createElement('span');
            const diameter = Math.max(button.clientWidth, button.clientHeight);
            const radius = diameter / 2;
            
            const rect = button.getBoundingClientRect();
            circle.style.width = circle.style.height = `${diameter}px`;
            circle.style.left = `${event.clientX - rect.left - radius}px`;
            circle.style.top = `${event.clientY - rect.top - radius}px`;
            circle.classList.add('ripple-effect');
            
            const ripple = button.querySelector('.ripple-effect');
            if (ripple) {
                ripple.remove();
            }
            
            button.appendChild(circle);
        }

        function startLoadingAnimation() {
            const spinner = document.querySelector('.loader-spinner');
            spinner.style.animation = 'complexSpin 2s linear infinite';
        }

        // Enhanced Copy to clipboard with celebration animation
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                showCopyFeedback();
                createCelebrationParticles();
            }).catch(() => {
                const textArea = document.createElement('textarea');
                textArea.value = text;
                document.body.appendChild(textArea);
                textArea.select();
                document.execCommand('copy');
                document.body.removeChild(textArea);
                showCopyFeedback();
                createCelebrationParticles();
            });
        }

        function showCopyFeedback() {
            const copyBtn = document.querySelector('.copy-btn');
            const originalHTML = copyBtn.innerHTML;
            copyBtn.innerHTML = '<i class="fas fa-check"></i><span class="copy-tooltip">Copied!</span>';
            copyBtn.classList.add('copied');
            
            setTimeout(() => {
                copyBtn.innerHTML = originalHTML;
                copyBtn.classList.remove('copied');
            }, 2000);
        }

        function createCelebrationParticles() {
            for (let i = 0; i < 10; i++) {
                const particle = document.createElement('div');
                particle.className = 'celebration-particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 2 + 's';
                document.body.appendChild(particle);
                
                setTimeout(() => {
                    particle.remove();
                }, 3000);
            }
        }

        // Enhanced Example fill with animation
        function fillExample(value) {
            hexInput.value = '';
            let i = 0;
            const typeEffect = setInterval(() => {
                if (i < value.length) {
                    hexInput.value += value.charAt(i);
                    i++;
                } else {
                    clearInterval(typeEffect);
                    validateInput();
                    inputWrapper.classList.add('example-filled');
                    setTimeout(() => {
                        inputWrapper.classList.remove('example-filled');
                    }, 1000);
                }
            }, 100);
            
            hexInput.focus();
        }

        // Counter animation for results
        function animateCounter(element, target) {
            let start = 0;
            const duration = 2000;
            const startTime = Date.now();
            
            const update = () => {
                const elapsed = Date.now() - startTime;
                const progress = Math.min(elapsed / duration, 1);
                
                // Easing function
                const easeOut = 1 - Math.pow(1 - progress, 3);
                const current = Math.floor(start + (target - start) * easeOut);
                
                element.textContent = current.toLocaleString();
                
                if (progress < 1) {
                    requestAnimationFrame(update);
                } else {
                    element.textContent = target.toLocaleString();
                }
            };
            
            update();
        }

        // Title letter animation
        function animateTitle() {
            const letters = document.querySelectorAll('.title-letter');
            letters.forEach((letter, index) => {
                letter.style.animationDelay = `${index * 0.1}s`;
                letter.classList.add('letter-bounce');
            });
        }

        // Service Worker registration for PWA functionality
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('service-worker.js')
                    .catch(err => console.error('ServiceWorker registration failed:', err));
            });
        }

        // Offline-friendly conversion in JavaScript
        function uidToDecimalJs(uid) {
            uid = uid.toUpperCase().replace(/:/g, '').trim();
            if (uid.length % 2 !== 0) {
                return null;
            }
            const bytes = uid.match(/.{1,2}/g);
            const reversed = bytes.reverse().join('');
            return parseInt(reversed, 16);
        }

        function displayJsResult(decimalValue) {
            const container = document.getElementById('result-container');
            container.innerHTML = '';
            const card = document.createElement('div');
            card.className = 'result-card success-card animate-in';
            card.innerHTML = `
                <div class="result-icon bounce-animation"><i class="fas fa-check-circle"></i></div>
                <div class="result-content">
                    <div class="result-label">Decimal ID</div>
                    <div class="result-value">${decimalValue}</div>
                    <button class="copy-btn pulse-on-hover" onclick="copyToClipboard('${decimalValue}')">
                        <i class="fas fa-copy"></i><span class="copy-tooltip">Copy to clipboard</span>
                    </button>
                </div>`;
            container.appendChild(card);
        }

        // Override form submission for offline capability
        form.addEventListener('submit', (e) => {
            if (!navigator.onLine) {
                e.preventDefault();
            }
            // Always compute locally for instant feedback
            const value = hexInput.value.trim();
            const hexPattern = /^[0-9a-fA-F:]+$/;
            if (!hexPattern.test(value)) {
                showValidation(false, 'Invalid format. Use only hexadecimal characters (0-9, A-F) and colons.');
                triggerErrorAnimation();
                return;
            }

            convertBtn.classList.add('loading');
            startLoadingAnimation();

            setTimeout(() => {
                const decimal = uidToDecimalJs(value);
                if (decimal !== null) {
                    displayJsResult(decimal);
                } else {
                    displayJsResult('Error');
                }
                convertBtn.classList.remove('loading');
            }, 300);
        }, true);

        // Initialize animations on load
        window.addEventListener('load', () => {
            document.body.classList.add('loaded');
            animateTitle();
            
            // Animate counter if result exists
            const counterElement = document.querySelector('.counter-animation');
            if (counterElement) {
                const target = parseInt(counterElement.dataset.target);
                if (target) {
                    animateCounter(counterElement, target);
                }
            }
            
            // Start particle animation
            createFloatingParticles();
        });

        // Floating particles animation
        function createFloatingParticles() {
            const particles = document.querySelectorAll('.particle');
            particles.forEach((particle, index) => {
                particle.style.animationDelay = `${index * 0.5}s`;
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
            });
        }

        // Mouse move parallax effect
        document.addEventListener('mousemove', (e) => {
            const mouseX = e.clientX / window.innerWidth;
            const mouseY = e.clientY / window.innerHeight;
            
            const particles = document.querySelectorAll('.particle');
            particles.forEach((particle, index) => {
                const speed = (index + 1) * 0.5;
                const x = mouseX * speed;
                const y = mouseY * speed;
                particle.style.transform = `translate(${x}px, ${y}px)`;
            });
        });
    </script>
</body>
</html>
