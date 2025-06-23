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

    <?php include 'partials/footer.php'; ?>
    
    <script src="/js/main.js"></script>
</body>
</html> 