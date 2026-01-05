<?php

// Get clean path without query string
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Router Logic
switch ($request) {

    case '/':
    case '/index.php':
        require_once __DIR__ . '/frontend/index.php';
        break;

    case '/blog':
        require_once __DIR__ . '/frontend/blog.php';
        break;

    case '/about':
        require_once __DIR__ . '/frontend/about.php';
        break;

    case '/contact':
        require_once __DIR__ . '/frontend/contact.php';
        break;

    case '/pricing':
        require_once __DIR__ . '/frontend/pricing.php';
        break;

    case '/shop':
        require_once __DIR__ . '/frontend/shop.php';
        break;

    case '/services':
        require_once __DIR__ . '/frontend/services.php';
        break;

    case '/blog-details':
        require_once __DIR__ . '/frontend/blog-details.php';
        break;


// backend route
    case '/admin':
    case '/admin/dashboard':
        require_once __DIR__ . '/backend/dashboard.php';
        break;


    case '/admin/login':
        require_once __DIR__ . '/backend/login.php';
        break;
    case '/admin/register':
        require_once __DIR__ . '/backend/register.php';
        break;
    case '/admin/logout':
        require_once __DIR__ . '/backend/logout.php';
        break;




// 404 defult 
    default:
        http_response_code(404);
        require_once __DIR__ . '/frontend/404.php';
        break;
}
