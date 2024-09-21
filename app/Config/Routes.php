<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/contact', 'Home::contact');
$routes->get('/menu', 'MenuController::index');
$routes->get('/menu/show/(:num)', 'MenuController::show/$1');
$routes->post('cart/', 'CartController::cart');
$routes->get('cart/checkout', 'CartController::checkout');
$routes->post('order/process_checkout', 'OrderController::processCheckout');
$routes->get('order/success', 'OrderController::success'); // Assuming you have a success method
$routes->get('/transaction/(:num)', 'OrderController::transaction/$1');
$routes->get('/register', 'AuthController::register');
$routes->post('/registerPost', 'AuthController::registerPost');
$routes->get('/login', 'AuthController::login');
$routes->post('/loginPost', 'AuthController::loginPost');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/dashboard', 'DashboardController::dashboard');
$routes->get('/logout', 'DashboardController::logout');

// Admin Routes
$routes->get('/admin/singup', 'Admin\AdminAuthController::index');
$routes->post('/admin/registerPost', 'Admin\AdminAuthController::registerPost');
$routes->get('/admin/dashboard', 'Admin\AdminAuthController::dashboard'); // Admin Dashboard
$routes->get('/admin/users', 'Admin\AdminAuthController::users');// User Management

$routes->get('/admin/add', 'Admin\AdminAuthController::add');
$routes->post('/admin/add_admin_process', 'Admin\AdminAuthController::add_process');

$routes->get('/admin/orders', 'Admin\AdminAuthController::orders');// Order Management
$routes->get('/admin/menu', 'Admin\AdminAuthController::menu');// Menu Management
$routes->get('/admin/transaction_report', 'Admin\AdminAuthController::transactionReport'); // Transaction Report


// Admin Menu Management Routes
$routes->get('/admin/menu_list', 'Admin\AdminMenuController::index');
$routes->match(['get', 'post'], '/admin/menu/add', 'Admin\AdminMenuController::add');
$routes->post('/admin/menu/store', 'Admin\AdminMenuController::store');
$routes->get('/admin/menu/edit/(:num)', 'Admin\AdminMenuController::edit/$1');  // Edit route
$routes->post('/admin/menu/update/(:num)', 'Admin\AdminMenuController::update/$1');  // Update route
$routes->get('/admin/menu/delete/(:num)', 'Admin\AdminMenuController::delete/$1');  // Delete route






