
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeeController;
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

Route::get('/employee', function () {
    return view('employeesTable');
});

Route::get('/employeetable',[employeeController::class,"view"])->name('view');



