<?php

// Parse the URL to get the path
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Remove the base path from the request URI
$basePath = '/basic-php-routing';
if (strpos($request, $basePath) === 0) {
    $request = substr($request, strlen($basePath));
}

$viewDir = '/views/';

switch ($request) {
    case '':
    case '/':
        require __DIR__ . $viewDir . 'home.php';
        break;

    case '/users':
        require __DIR__ . $viewDir . 'users.php';
        break;

    case '/contact':
        require __DIR__ . $viewDir . 'contact.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . $viewDir . '404.php';
}
