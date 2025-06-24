<!-- Hero + Converter Section -->
<section id="home" class="hero-section">
    <div class="container">
        <div class="hero-container">
            <div class="header">
                <div class="icon-wrapper" data-aos="zoom-in" data-aos-delay="200">
                    <i class="fas fa-wifi icon-main"></i>
                    <div class="icon-rings">
                        <div class="ring ring-1"></div>
                        <div class="ring ring-2"></div>
                        <div class="ring ring-3"></div>
                    </div>
                </div>
                <h1 class="title" data-aos="fade-up" data-aos-delay="400">
                    <span class="title-letter">N</span><span class="title-letter">F</span><span class="title-letter">C</span>
                    <span class="title-space"> </span>
                    <span class="title-letter">U</span><span class="title-letter">I</span><span class="title-letter">D</span>
                    <span class="title-space"> </span>
                    <span class="title-letter">C</span><span class="title-letter">o</span><span class="title-letter">n</span><span class="title-letter">v</span><span class="title-letter">e</span><span class="title-letter">r</span><span class="title-letter">t</span><span class="title-letter">e</span><span class="title-letter">r</span>
                </h1>
                <p class="subtitle" data-aos="fade-up" data-aos-delay="600">Convert NFC/RFID hexadecimal UIDs to decimal format</p>
            </div>

            <div class="converter-card" data-aos="slide-up" data-aos-delay="800">
                <div class="card-glow"></div>
                <form method="POST" action="/" id="converter-form">
                    <div class="input-group">
                        <label for="hex_uid" class="input-label"><i class="fas fa-hashtag"></i>Hexadecimal UID</label>
                        <div class="input-wrapper">
                            <div class="input-glow"></div>
                            <input type="text" id="hex_uid" name="hex_uid" placeholder="e.g., 04:A1:B2:C3 or 04A1B2C3" autocomplete="off" spellcheck="false">
                            <div class="input-validation"><i class="fas fa-check validation-icon"></i></div>
                            <div class="typing-cursor"></div>
                        </div>
                        <div class="input-feedback"></div>
                    </div>
                    <button type="submit" name="submit" class="convert-btn" id="convert-btn">
                        <div class="btn-bg-animation"></div>
                        <span class="btn-text">Convert to Decimal</span>
                        <span class="btn-loader"><div class="loader-spinner"><div class="spinner-inner"></div><div class="spinner-inner"></div><div class="spinner-inner"></div></div></span>
                        <span class="btn-icon"><i class="fas fa-arrow-right"></i></span>
                        <div class="btn-ripple"></div>
                    </button>
                </form>
                
                <?php if (isset($result)): ?>
                <div id="result-container" class="result-section">
                    <div class="result-card <?php echo strpos($result, 'Error') === false ? 'success-card' : 'error-card'; ?>">
                         <div class="result-icon bounce-animation"><i class="fas <?php echo strpos($result, 'Error') === false ? 'fa-check-circle' : 'fa-times-circle'; ?>"></i></div>
                        <div class="result-content">
                            <div class="result-label"><?php echo strpos($result, 'Error') === false ? 'Decimal ID' : 'Error'; ?></div>
                            <div class="result-value"><?php echo htmlspecialchars(str_replace(['Decimal ID: ', 'Error: '], '', $result)); ?></div>
                             <?php if (strpos($result, 'Error') === false): ?>
                            <button class="copy-btn pulse-on-hover" onclick="copyToClipboard('<?php echo htmlspecialchars(str_replace('Decimal ID: ', '', $result)); ?>', this)">
                                <i class="fas fa-copy"></i><span class="copy-tooltip">Copy to clipboard</span>
                            </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Info Section -->
<section class="section">
    <div class="container">
        <div class="info-section">
            <div class="info-card" data-aos="zoom-in" data-aos-delay="100">
                <div class="card-shine"></div>
                <h3><i class="fas fa-info-circle"></i> How it works</h3>
                <p>This tool converts NFC/RFID hexadecimal UIDs to decimal format by reversing the byte order and converting to decimal. Commonly used for access control systems and IoT applications.</p>
            </div>
            
            <div class="examples" data-aos="fade-up" data-aos-delay="200">
                <h4>Example formats:</h4>
                <div class="example-list">
                    <div class="example-item hover-lift" onclick="fillExample('04:A1:B2:C3')" data-aos="flip-up" data-aos-delay="300">
                        <div class="example-glow"></div>
                        <code>04:A1:B2:C3</code>
                        <i class="fas fa-arrow-right arrow-bounce"></i>
                        <span class="result-preview">3286138884</span>
                    </div>
                    <div class="example-item hover-lift" onclick="fillExample('1A2B3C4D')" data-aos="flip-up" data-aos-delay="500">
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
        <h2 class="section-title" data-aos="fade-up">About This Tool</h2>
        <div class="about-grid">
            <div class="about-card" data-aos="card-lift" data-aos-delay="100">
                <div class="about-icon"><i class="fas fa-bolt"></i></div>
                <h3>Lightning Fast</h3>
                <p>Instant conversion with real-time validation and beautiful animations.</p>
            </div>
            <div class="about-card" data-aos="card-lift" data-aos-delay="250">
                <div class="about-icon"><i class="fas fa-cloud-download-alt"></i></div>
                <h3>Works Offline</h3>
                <p>Progressive Web App technology ensures conversion works even without internet.</p>
            </div>
            <div class="about-card" data-aos="card-lift" data-aos-delay="400">
                <div class="about-icon"><i class="fas fa-mobile-alt"></i></div>
                <h3>Mobile Ready</h3>
                <p>Responsive design works perfectly on phones, tablets, and desktops.</p>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="section">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Features</h2>
        <div class="features-list">
            <div class="feature-item" data-aos="fade-left" data-aos-delay="100"><i class="fas fa-check-circle"></i><span>Real-time hex validation</span></div>
            <div class="feature-item" data-aos="fade-left" data-aos-delay="200"><i class="fas fa-check-circle"></i><span>Copy results with one click</span></div>
            <div class="feature-item" data-aos="fade-left" data-aos-delay="300"><i class="fas fa-check-circle"></i><span>Dark and light themes</span></div>
            <div class="feature-item" data-aos="fade-left" data-aos-delay="400"><i class="fas fa-check-circle"></i><span>Animated user interface</span></div>
            <div class="feature-item" data-aos="fade-left" data-aos-delay="500"><i class="fas fa-check-circle"></i><span>Installable as mobile app</span></div>
            <div class="feature-item" data-aos="fade-left" data-aos-delay="600"><i class="fas fa-check-circle"></i><span>Works completely offline</span></div>
        </div>
    </div>
</section>

<!-- Donation Section -->
<section id="donate" class="section">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Support This Project</h2>
        <div class="donate-content">
            <p class="donate-description" data-aos="fade-up" data-aos-delay="100">If this tool has been helpful to you, consider supporting its development and maintenance. Your support helps keep this tool free and continuously improved!</p>
            <div class="donate-options">
                <a href="https://coff.ee/severusraj" target="_blank" class="donate-btn coffee-btn" data-aos="bounce-in" data-aos-delay="200"><i class="fas fa-coffee"></i><span>Buy me a coffee</span></a>
                <a href="https://paypal.me/angelojaminal" target="_blank" class="donate-btn paypal-btn" data-aos="bounce-in" data-aos-delay="350"><i class="fab fa-paypal"></i><span>PayPal</span></a>
                <button class="donate-btn crypto-btn" onclick="showCryptoAddresses()" data-aos="bounce-in" data-aos-delay="500"><i class="fab fa-bitcoin"></i><span>Crypto</span></button>
            </div>
            <div class="crypto-addresses" id="crypto-addresses" style="display: none;">
                <div class="crypto-item" data-aos="slide-up" data-aos-delay="100">
                    <span class="crypto-label">Bitcoin:</span>
                    <code class="crypto-address" onclick="copyToClipboard(this.textContent, this)">bc1qjmvh6yejezrxpek0e8rctqetez8nllmzv6ktnu</code>
                    <i class="fas fa-copy crypto-copy"></i>
                </div>
                <div class="crypto-item" data-aos="slide-up" data-aos-delay="250">
                    <span class="crypto-label">Ethereum:</span>
                    <code class="crypto-address" onclick="copyToClipboard(this.textContent, this)">0x476Eb9F5AB82F401c09Cdc991D8b39bd7ea7155C</code>
                    <i class="fas fa-copy crypto-copy"></i>
                </div>
            </div>
        </div>
    </div>
</section> 