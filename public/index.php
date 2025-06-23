<?php

session_start();

require __DIR__ . '/../vendor/autoload.php';

// Load environment variables from .env if present
if (class_exists('Dotenv\\Dotenv')) {
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->safeLoad();
}

use NfcRfidConverter\Converter;

// --- Routing ---
$routes = require __DIR__ . '/../routes.php';
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Find the template for the current URI.
$templatePath = $routes[$uri] ?? null;


// --- POST Logic (specific to the converter on the homepage) ---
if ($uri === '/' && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hex_uid'])) {
    $converter = new Converter();
    $hex_uid = $_POST['hex_uid'];
    try {
        $decimal_id = $converter->uidToDecimal($hex_uid);
        $_SESSION['result'] = "Decimal ID: " . $decimal_id;
    } catch (Exception $e) {
        $_SESSION['result'] = "Error: " . $e->getMessage();
    }
    header('Location: /');
    exit;
}

$result = $_SESSION['result'] ?? null;
unset($_SESSION['result']);


// --- View Rendering ---
ob_start();

if ($templatePath) {
    require __DIR__ . '/../templates/' . $templatePath;
} else {
    // Basic 404 handler
    http_response_code(404);
    require __DIR__ . '/../templates/partials/404.php';
}

$content = ob_get_clean();

require __DIR__ . '/../templates/layout.php'; 