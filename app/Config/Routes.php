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

// Dashboard Umum
$routes->get(
    'dashboard',
    '\App\Modules\Dashboard\Controllers\Dashboard::index'
);

// Optional temporary route
$routes->get('home', 'App\Controllers\Home::index');