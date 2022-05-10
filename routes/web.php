<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\productController;
use App\Http\Controllers\placesController;
use App\Http\Controllers\userController;
use App\Http\Controllers\historyController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/users', function () {
    return view('users');
});


Route::get('warehouse', function () {
    return view('warehouseManager/warehouseTable');
})->name('warehouse');

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('logout', function () {
    return view('logout');
})->name('logout');

Route::get('dashboardwm', function () {
    return view('warehouseManager/dashboardWm');
})->name('dashboardwm');

Route::get('profilepage', function () {
    return view('profilePage');
})->name('profilePage');


Route::get('users', [userController::class, 'view'])->name('users.view');
Route::post('/inventory', [productController::class, 'store']);


Route::get('/search','placesController@search');

Route::get('history', [historyController::class, 'index'])->name('history.index');

Route::get('places', [placesController::class, 'index'])->name('places.index');
Route::get('edit/{place_id}', [placesController::class, 'edit']);
Route::get('delete/{place_id}',[placesController::class,'destroy']);
Route::post('update/{place_id}', [placesController::class, 'update']);
Route::post('places', [placesController::class, 'store']);



Route::get('products', [productController::class, 'index'])->name('products.index');
Route::get('edit1/{product_id}', [productController::class, 'edit']);
Route::get('delete1/{product_id}',[productController::class,'destroy']);
Route::post('update1/{product_id}', [productController::class, 'update']);
Route::post('products', [productController::class, 'store']);