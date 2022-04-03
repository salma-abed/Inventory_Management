<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\productController;
use App\Http\Controllers\placesController;

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


Route::get('/employeetable',[employeeController::class,"view"])->name('view');


Route::get('/warehouse', function () {
    return view('warehouseManager/warehouseTable');
});
Route::get('/dashboard',function(){
    return view('dashboard');
});
Route::get('/profilepage',function(){
    return view('profilePage');
});

Route::post('/inventory',[productController::class,'store']);

Route::post('/places',[placesController::class,'store']);
Route::get('/places',[placesController::class,'index']);

Route::get('/edit/{place_id}',[placesController::class,'edit']);
Route::post('/update/{place_id}',[placesController::class,'update']); 
