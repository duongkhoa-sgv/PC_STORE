<?php

require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/CartController.php';
require_once __DIR__ . '/../app/controllers/OrderController.php';
require_once __DIR__ . '/../app/middleware/AuthMiddleware.php';

$routes = [

    // ===== VIEW =====
    'login' => ['AuthController', 'showLogin'],
    'register' => ['AuthController', 'showRegister'],
    'profile' => ['AuthController', 'profile', 'auth'],

    // ===== ACTION =====
    'login_action' => ['AuthController', 'login'],
    'register_action' => ['AuthController', 'register'],
    'logout_action' => ['AuthController', 'logout'],

    // ===== HOME =====
    'home' => function () {
        echo "<h1>Home Page</h1>";
    },

    // ===== CART =====
    'cart' => ['CartController', 'view'],
    'cart_add' => ['CartController', 'add'],
    'cart_remove' => ['CartController', 'remove'],

    // ===== ORDER =====
    'checkout' => ['OrderController', 'checkout', 'auth'],
    'orders' => ['OrderController', 'history', 'auth'],
];


// ==============================
// HANDLE REQUEST
// ==============================

$page = $_GET['page'] ?? 'login';
$action = $_GET['action'] ?? null;

// 👉 ưu tiên action nếu có
if ($action) {
    $routeKey = $action . '_action';
} else {
    $routeKey = $page;
}

// 👉 check route
if (!isset($routes[$routeKey])) {
    echo "404 - Page not found";
    exit();
}

$route = $routes[$routeKey];


// ==============================
// HANDLE CLOSURE
// ==============================

if (is_callable($route)) {
    $route();
    exit();
}


// ==============================
// PARSE ROUTE
// ==============================

$controllerName = $route[0];
$method = $route[1];
$middleware = $route[2] ?? null;


// ==============================
// MIDDLEWARE
// ==============================

if ($middleware === 'auth') {
    AuthMiddleware::handle();
}


// ==============================
// CALL CONTROLLER
// ==============================

$controller = new $controllerName();

if (!method_exists($controller, $method)) {
    echo "Method not found";
    exit();
}

$controller->$method();
