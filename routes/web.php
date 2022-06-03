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




Route::post('/inventory', [productController::class, 'store']);

Route::get('history', [historyController::class, 'index'])->name('history.index');

Route::post('history', [historyController::class, 'store']);



<<<<<<< HEAD

Route::get('users', [userController::class, 'view'])->name('users.view');
Route::get('users', [userController::class, 'ViewPlaces'])->name('users.ViewPlaces');




=======
Route::get('users', [userController::class, 'view'])->name('users.view');
Route::get('users', [userController::class, 'ViewPlaces'])->name('users.ViewPlaces');
>>>>>>> 82e4a4a68a7b3903d8d96cf3883d6d6b3048ca94
Route::post('Transport', [placesController::class, 'Transport']);
Route::post('places', [placesController::class, 'CheckProductQuantity']);


/*Route::get('products', [productController::class, 'index'])->name('products.index');
Route::get('edit1/{product_id}', [productController::class, 'ViewOldProductData']);
Route::get('delete1/{product_id}', [productController::class, 'DeleteProduct']);
Route::post('update1/{product_id}', [productController::class, 'UpdateProduct']);
Route::post('products', [productController::class, 'AddProduct']);
Route::get('/Edit/{product_quantity}', [productController::class, 'Edit']); */


Route::controller(AdminController::class)->group(function () {
    Route::get('productsAdmin', 'Products_index')->name('products.Products_index');
    Route::get('edit1/{product_id}', 'ViewOldProductData');
    Route::get('delete1/{product_id}', 'DeleteProduct');
    Route::post('update1/{product_id}', 'UpdateProduct');
    Route::post('productsAdmin', 'AddProduct');


    #where do we display these? ----------------------------------------------------------(first paramter)?
<<<<<<< HEAD
    Route::post('placesAdmin', 'ViewPlaces');
    Route::post('placesAdmin', 'AddPlace');
    Route::post('delete1/{place_id}', 'DeletePlace');


    Route::get('usersPage', [userController::class, 'view'])->name('users.view');
    #Route::get('users', [userController::class, 'ViewUsers'])->name('users.ViewUsers');

=======
  /* Route::post('placesAdmin', 'ViewPlaces'); 
    Route::post('placesAdmin', 'AddPlace'); 
    Route::post('delete1/{place_id}', 'DeletePlace');*/
   #Route::get('users', [userController::class, 'ViewUsers'])->name('users.ViewUsers');
    
>>>>>>> 82e4a4a68a7b3903d8d96cf3883d6d6b3048ca94
    Route::post('places', 'ViewPlaces');
    Route::post('places', 'AddPlace');
    Route::post('delete1/{place_id}', 'DeletePlace');
});
Route::get('users', [userController::class, 'view'])->name('users.view');
Route::get('users', [userController::class, 'ViewUsers'])->name('users.view');

Route::controller(WarehouseManagerController::class)->group(function () {
    #where do we display these? ----------------------------------------------------------(first paramter)?
    Route::get('placesWm', 'ViewPlaces');

    #where do we display these? ----------------------------------------------------------(first paramter)?
    Route::get('places', 'ViewPlaces');
});

Route::controller(SalesController::class)->group(function () {
});
Route::middleware('role:admin,sales,operations,warehouse')->group(function () {

    Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
    #Route::get('products', [CustomAuthController::class, 'products'])->name('products');
});
Route::middleware('role:admin')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('productsAdmin', 'Products_index')->name('products.index');
        Route::get('edit1/{product_id}', 'ViewOldProductData');
        Route::get('delete1/{product_id}', 'DeleteProduct');
        Route::post('update1/{product_id}', 'UpdateProduct');
        Route::post('productsAdmin', 'AddProduct');
    });
    Route::get('history', [historyController::class, 'index'])->name('history.index');
    # Route::get('PrintingHouse', [CustomAuthController::class, 'PrintingHouse'])->name('PrintingHouse');
});
Route::middleware('role:warehouse')->group(function () {
    Route::get('order/details/{id}', ['uses' => 'OrderController@details', 'as' => 'order.details', 'https']);
});
Route::middleware('role:operations,sales')->group(function () {
    Route::get('Store', [CustomAuthController::class, 'Store'])->name('Store');
});
Route::middleware('role:operations')->group(function () {
 Route::controller(OperationsAssociateController::class)->group(function () {
    Route::get('productsOA', 'index');
    Route::get('delete1/{product_id}', 'DeleteProduct');
    Route::post('productsOA', 'AddProduct');
 });

});
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('redzones', [RedZonesController::class, 'SendNotification'])->name('redzones');
//url($language.'/index', [], true);
asset('css/bootstrap.min.css', true);