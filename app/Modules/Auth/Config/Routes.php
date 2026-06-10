<?php

namespace App\Modules\Auth\Config;

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Auth Routes
$routes->group('auth', function ($routes) {
    $routes->get('login', 'Auth::login');
    $routes->post('attemptLogin', 'Auth::attemptLogin');
    $routes->get('logout', 'Auth::logout');
    
    // Register (akan kita buat nanti)
    $routes->get('register', 'Auth::register');
    $routes->post('attemptRegister', 'Auth::attemptRegister');
});