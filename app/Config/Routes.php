<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Root Route
$routes->get('/', function () {
    if (session()->get('isLoggedIn')) {
        return redirect()->to('/dashboard');
    }
    return redirect()->to('/auth/login');
});

// Auth Routes
$routes->group('auth', ['namespace' => 'App\Modules\Auth\Controllers'], function ($routes) {
    $routes->get('login', 'Auth::login');
    $routes->post('attemptLogin', 'Auth::attemptLogin');
    $routes->get('register', 'Auth::register');
    $routes->post('attemptRegister', 'Auth::attemptRegister');
    $routes->get('logout', 'Auth::logout');
    
});

$routes->group('purchase', function ($routes) {

    $routes->get('/', 'Produk::kategori');

    $routes->get('bulk-carrier', 'Produk::bulkCarrier');

    $routes->get('passenger-ship', 'Produk::passengerShip');

    $routes->get('tug-boat', 'Produk::tugBoat');

    $routes->get('detail/(:num)', 'Produk::detail/$1');
});

// Dashboard Umum
$routes->get(
    'dashboard',
    '\App\Modules\Dashboard\Controllers\Dashboard::index'
);
$routes->get(
    'auth/forgot-password',
    '\App\Modules\Auth\Controllers\Auth::forgotPassword'
);

$routes->post(
    'auth/update-forgot-password',
    '\App\Modules\Auth\Controllers\Auth::updateForgotPassword'
);

// Optional temporary route
$routes->get('home', 'App\Controllers\Home::index');