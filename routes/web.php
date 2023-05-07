<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Barang;
use App\Http\Controllers\Pelanggan;
use App\HttP\Controllers\Profile;
use App\HttP\Controllers\Employee;
use App\HttP\Controllers\ProductsController;
use App\HttP\Controllers\SupplierController;
use App\HttP\Controllers\PurchaseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/langsung',function(){//cara mengaksesnya http://127.0.0.1:8000/langsung
    echo"ini tampilan dari function route langsung";
});

//routes langsung menampilkan file view
Route::view('/ini_route_view','welcome');

//routes untuk direct
Route::redirect('/','/welcome');

//routes dengan parameter data
Route::get('/route_param/{id}',function($id){
    echo'ini data dari parameter route param : '.$id;
});

Route::group(['prefix'=>'admin'],function(){
    Route::get ('langsung', function(){//cara mengaksesnya http://127.0.0.1:8000/admin/langsung
        echo "ini ditampilkan dari function routes langsung";
    });
    Route::get('group_param/{id}',function($id){//cara mengaksesnya http://127.0.0.1:8000/admin/group_route_satu
        echo "ini ditampilkan dari function routes group : ".$id;
    });
});
    
//menghubungkan routes dengan controler
Route::get('/pelanggan',[Pelanggan::class, 'index']);
Route::get('/route_cont/{id}', [Barang::class, 'index']);
Route::get('/gata', [Barang::class, 'coba']);

// 
Route::get('/simpan_test', [Barang::class, 'simpan_get']);
Route::get('/hapus_test/{id}', [Barang::class, 'hapus_get']);
Route::get('/update_test/{id}', [Barang::class, 'update_get']);
Route::get('/view_test', [Barang::class, 'view_get']);

Route::get('/profile', [Profile::class, 'index']);

//UTS ROUTE

Route::get('/view_employee',[Employee::class, 'index']);

Route::get('/delete_employee',[Employee::class, 'delete']);

Route::get('/edit_employee',[Employee::class, 'edit']);

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