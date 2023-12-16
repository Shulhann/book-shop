<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);

$routes->get('/', 'Pages::index');

$routes->get('/login', 'LoginController::index');
$routes->post('/login_action', 'LoginController::login_action');
$routes->get('/logout', 'LoginController::logout');

$routes->get('beli/(:segment)', 'Pages::beli/$1');
$routes->post('checkout', 'Pages::checkout');