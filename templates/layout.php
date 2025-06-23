<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NFC UID Converter - Fast & Offline RFID Tool</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="A free, modern, and offline-capable tool to instantly convert NFC/RFID UIDs from hexadecimal to decimal format. Built for the IoT community, developers, and hobbyists.">
    <meta name="keywords" content="NFC, RFID, UID, converter, hexadecimal, decimal, IoT, access control, PWA, offline tool, developer, electronics">
    <meta name="author" content="NFC RFID Converter">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://your-domain.com/">
    <meta property="og:title" content="NFC UID Converter - Fast & Offline RFID Tool">
    <meta property="og:description" content="Instantly convert NFC/RFID hexadecimal UIDs to decimal format, even offline. A modern tool for the IoT community.">
    <meta property="og:image" content="https://your-domain.com/public/icons/social-preview.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://your-domain.com/">
    <meta property="twitter:title" content="NFC UID Converter - Fast & Offline RFID Tool">
    <meta property="twitter:description" content="Instantly convert NFC/RFID hexadecimal UIDs to decimal format, even offline. A modern tool for the IoT community.">
    <meta property="twitter:image" content="https://your-domain.com/public/icons/social-preview.png">

    <!-- PWA & Theme -->
    <link rel="manifest" href="manifest.json">
    <meta name="theme-color" content="#3b82f6">
    <link rel="apple-touch-icon" href="/icons/icon-192.png">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
    <link rel="shortcut icon" href="/icons/favicon.ico">
    <link rel="icon" href="/favicon.ico">

    <!-- Styles and Fonts -->
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebApplication",
      "name": "NFC UID Converter",
      "description": "A free, modern, and offline-capable tool to instantly convert NFC/RFID UIDs from hexadecimal to decimal format.",
      "applicationCategory": "DeveloperApplication",
      "operatingSystem": "All",
      "browserRequirements": "Requires HTML5, CSS3, JavaScript",
      "url": "https://nfc-rfid-converter-production.up.railway.app/"
    }
    </script>
</head>
<body data-theme="light">

    <?php include 'partials/navbar.php'; ?>
    <?php include 'partials/background_effects.php'; ?>

    <main class="main-content">
        <?php echo $content; ?>
    </main>

    <!-- Privacy & Terms Modals -->
    <div id="privacy-modal" class="modal-overlay" style="display:none;">
        <div class="modal-window">
            <button class="modal-close" aria-label="Close privacy policy">&times;</button>
            <h2>Privacy Policy</h2>
            <p>We respect your privacy. All conversions are performed completely in your browser; no UID data is ever sent to our servers. If you install this app (PWA) it works entirely offline. We do not collect personal information, analytics, or tracking cookies. Any optional donations are processed by third-party providers (BuyMeACoffee, PayPal, or your crypto wallet) under their own privacy policies.</p>
            <p>If you have questions, contact us at <a href="mailto:dev.ralph07@gmail.com">dev.ralph07@gmail.com</a>.</p>
        </div>
    </div>
    <div id="terms-modal" class="modal-overlay" style="display:none;">
        <div class="modal-window">
            <button class="modal-close" aria-label="Close terms of use">&times;</button>
            <h2>Terms of Use</h2>
            <p>This tool is provided "as-is" without warranties of any kind. By using it you acknowledge that conversions are for informational purposes only and you assume all responsibility for any use of the outputs. We are not liable for damages arising from use or inability to use the site. You may use the tool freely for personal or commercial projects, but you may not resell or re-host it without attribution.</p>
            <p>Continued use of the site constitutes acceptance of these terms.</p>
        </div>
    </div>

    <?php include 'partials/footer.php'; ?>
    
    <script src="/js/main.js"></script>
</body>
</html> 