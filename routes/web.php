<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
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

Route::get('/', function () {
    return view('login');
});
Route::get('/inventory', function () {
    return view('inventoryAdminPage');
});
Route::get('/warehouses', function () {
    return view('inventoryWarehouseTable');
});
Route::get('/dashboard',function(){
    return view('dashboard');
});

Route::post('/inventory',[productController::class,'store']);