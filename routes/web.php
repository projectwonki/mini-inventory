<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SupplierController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

$router->get('/abc', function () {
    return 'a';
});

$router->get('/products', 'ProductController@index');
$router->get('/products/{productId}', 'ProductController@show');
$router->post('/products', 'ProductController@store');
$router->put('/products/{productId}', 'ProductController@update');
$router->delete('/products/{productId}', 'ProductController@destroy');

$router->get('/suppliers', 'SupplierController@index');
$router->get('/suppliers/{supplierId}', 'SupplierController@show');
$router->post('/suppliers', 'SupplierController@store');
$router->put('/suppliers/{supplierId}', 'SupplierController@update');
$router->delete('/suppliers/{supplierId}', 'SupplierController@destory');

$router->get('/purchases', 'PurchaseController@index');
$router->get('/purchases/{purchaseId}', 'PurchaseController@show');
$router->post('/purchases', 'PurchaseController@store');
$router->put('/purchases/{purchaseId}', 'PurchaseController@update');
$router->delete('/purchases/{purchaseId}', 'PurchaseController@destroy');
