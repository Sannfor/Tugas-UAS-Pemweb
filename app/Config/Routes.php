<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', function () {
    if (session()->get('isLoggedIn')) {
        $role = session()->get('role');
        
        if ($role === 'admin') {
            return redirect()->to('/admin/dashboard');
        } elseif ($role === 'mitra') {
            return redirect()->to('/mitra/dashboard');
        } else {
            return redirect()->to('/user/dashboard');
        }
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

$routes->group('admin', ['namespace' => 'App\Modules\Admin\Controllers'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');
});

// Home Route
$routes->get('/', 'App\Controllers\Home::index');
