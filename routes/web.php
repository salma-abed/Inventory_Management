<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\productController;
use App\Http\Controllers\placesController;
use App\Http\Controllers\userController;
use App\Http\Controllers\historyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OperationsAssociateController;
use App\Http\Controllers\WarehouseManagerController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\CustomAuthController;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/



Route::get('/users', function () {
    return view('users');
});


Route::get('warehouse', function () {
    return view('warehouseManager/warehouseTable');
})->name('warehouse');



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


Route::get('/search', 'placesController@search');

Route::get('history', [historyController::class, 'index'])->name('history.index');

Route::get('places', [placesController::class, 'index'])->name('places.index');
Route::get('history', [historyController::class, 'index'])->name('history.index');


Route::get('edit/{place_id}', [placesController::class, 'edit']);

Route::get('show', [placesController::class, 'show']);

Route::get('delete/{place_id}', [placesController::class, 'destroy']);
Route::post('update/{place_id}', [placesController::class, 'update']);
Route::post('Transport', [placesController::class, 'Transport']);

Route::post('places', [placesController::class, 'store']);
Route::post('history', [historyController::class, 'store']);



/*Route::get('products', [productController::class, 'index'])->name('products.index');
Route::get('edit1/{product_id}', [productController::class, 'ViewOldProductData']);
Route::get('delete1/{product_id}', [productController::class, 'DeleteProduct']);
Route::post('update1/{product_id}', [productController::class, 'UpdateProduct']);
Route::post('products', [productController::class, 'AddProduct']);
Route::get('/Edit/{product_quantity}', [productController::class, 'Edit']); */


Route::controller(AdminController::class)->group(function () {
    Route::get('productsAdmin', 'index')->name('products.index');
    Route::get('edit1/{product_id}', 'ViewOldProductData');
    Route::get('delete1/{product_id}', 'DeleteProduct');
    Route::post('update1/{product_id}', 'UpdateProduct');
    Route::post('productsAdmin', 'AddProduct');
});

Route::controller(OperationsAssociateController::class)->group(function () {
    Route::get('productsOA', 'index');
    Route::get('delete1/{product_id}', 'DeleteProduct');
    Route::post('productsOA', 'AddProduct');
});

Route::controller(WarehouseManagerController::class)->group(function () {
});

Route::controller(SalesController::class)->group(function () {
});
Route::middleware('role:admin,sales,operations,warehouse')->group(function () {

    Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
});
Route::middleware('role:warehouse')->group(function () {
    Route::get('order/details/{id}', ['uses' => 'OrderController@details', 'as' => 'order.details', 'https']);
});
Route::middleware('role:operations,sales')->group(function () {
    Route::get('Store', [CustomAuthController::class, 'Store'])->name('Store');
});
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('redzones', [productController::class, 'RedZones'])->name('redzones');
//url($language.'/index', [], true);
//asset('css/bootstrap.min.css', true);