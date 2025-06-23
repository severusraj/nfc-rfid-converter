<?php

/**
 * A simple router for the PHP built-in web server.
 */

$publicDir = __DIR__ . '/public';

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Normalize directory separators for cross-platform compatibility
$requestedFile = $publicDir . str_replace('/', DIRECTORY_SEPARATOR, $uri);

// This is the important part. If the requested URI is a file that exists
// in the public directory, we return false to let the built-in server handle it.
if ($uri !== '/' && file_exists($requestedFile) && is_file($requestedFile)) {
    return false;
}

// For all other requests, we require the main index.php script.
// This is the front-controller pattern.
require_once $publicDir . '/index.php'; 