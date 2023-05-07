<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\HttP\Controllers\ProductsController;
use App\HttP\Controllers\SupplierController;
use App\HttP\Controllers\PurchaseController;

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


Route::group(['prefix' => 'products'], function(){
    Route::get('/create', [ProductsController::class, 'create']);
    Route::post('/store', [ProductsController::class, 'store']);
    Route::get('/view', [ProductsController::class, 'index']);
    Route::get('/delete/{id}', [ProductsController::class, 'destroy']);
    Route::get('/edit/{id}', [ProductsController::class, 'edit']);
    Route::post('{id}/update', [ProductsController::class, 'update']);
});
Route::group(['prefix' => 'supplier'], function(){
    Route::get('/create', [SupplierController::class, 'create']);
    Route::post('/store', [SupplierController::class, 'store']);
    Route::get('/view', [SupplierController::class, 'index']);
    Route::get('/delete/{id}', [SupplierController::class, 'destroy']);
    Route::get('/edit/{id}', [SupplierController::class, 'edit']);
    Route::post('{id}/update', [SupplierController::class, 'update']);
});
Route::group(['prefix' => 'purchase'], function(){
    Route::get('/create', [PurchaseController::class, 'create']);
    Route::post('/store', [PurchaseController::class, 'store']);
    Route::get('/view', [PurchaseController::class, 'index']);
    Route::get('/delete/{id}', [PurchaseController::class, 'destroy']);
    Route::get('/edit/{id}', [PurchaseController::class, 'edit']);
    Route::post('{id}/update', [PurchaseController::class, 'update']);
});
