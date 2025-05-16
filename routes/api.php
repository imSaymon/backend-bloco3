<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductCategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProductPhotosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * GET /PRODUCTS
 * GET /PRODUCTS/:ID
 * POST /PRODUCTS
 * PUT/PATCH /PRODUCTS/:ID
 * DELETE /PRODUCTS/:ID
 */

    
Route::apiResource('products.categories', ProductCategoryController::class)
    ->only('index');

Route::apiResource('products.photos', ProductPhotosController::class)
    ->only('index', 'store', 'destroy')
    ->middleware('auth:sanctum');

Route::apiResource('products', ProductController::class)
    ->middleware('auth:sanctum');


Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Route::controller(ProductController::class)
// ->prefix('products')
// ->group(function () {
//     Route::get('/', 'index');
//     Route::get('/{product}', 'show');
//     Route::post('/', 'store');
//     Route::match(['put', 'patch'], '/{product}', 'update');
//     Route::delete('/{product}', 'destroy');
// });
