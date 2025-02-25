<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index', ['filter' => 'auth']);

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login', ['filter' => 'redirect']);
$routes->get('logout', 'AuthController::logout');

$routes->group('produk', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'ProdukController::index', ['filter' => 'auth']);
    $routes->post('', 'ProdukController::create');
    $routes->post('edit/(:any)', 'ProdukController::edit/$1');
    $routes->get('delete/(:any)', 'ProdukController::delete/$1');
    $routes->get('download', 'ProdukController::download');
});

$routes->group('keranjang', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'TransaksiController::index');
    $routes->post('', 'TransaksiController::cart_add');
    $routes->post('edit', 'TransaksiController::cart_edit');
    $routes->get('delete/(:any)', 'TransaksiController::cart_delete/$1');
    $routes->get('clear', 'TransaksiController::cart_clear');
});

$routes->get('checkout', 'TransaksiController::checkout', ['filter' => 'auth']);
$routes->get('getcity', 'TransaksiController::getcity', ['filter' => 'auth']);
$routes->get('getcost', 'TransaksiController::getcost', ['filter' => 'auth']);
$routes->post('buy', 'TransaksiController::buy', ['filter' => 'auth']);


$routes->get('keranjang', 'TransaksiController::index', ['filter' => 'auth']);

$routes->get('faq', 'Home::faq', ['filter' => 'auth']);
$routes->get('contact', 'Home::contact', ['filter' => 'auth']);
$routes->get('profile', 'Home::profile', ['filter' => 'auth']);

$routes->group('api', function ($routes) {
    $routes->post('monthly', 'ApiController::monthly');
    $routes->post('yearly', 'ApiController::yearly');
});

// $routes->group('api', function ($routes) {
//     $routes->post('yearly', 'ApiController::yearly');
// });
    
    // transaksi
$routes->group('transaksi', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'TransaksiController::transaksi');
    $routes->post('updateStatus', 'TransaksiController::updateStatus');
    $routes->get('downloadTransaksi', 'TransaksiController::downloadTransaksi');
});