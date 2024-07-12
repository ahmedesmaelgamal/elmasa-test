<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\CustomerOrderStatusController;
use App\Http\Controllers\CustomerPhoneController;
use App\Http\Controllers\DeliveryManController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StockStatusController;
use App\Http\Controllers\TraderController;
use App\Http\Controllers\TraderStatusController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();// authentication    must me at the begining

// Route::get('/{page}',[AdminController::class,'index']); // for the admin dashboard theme

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');//for the authentication
// Route::resource('traders', TraderController::class);
// Route::resource('customers', CustomerController::class);
Route::controller(CustomerController::class)->group(function(){
    Route::get('customers/index','index')->name('customers.index');
    Route::get('customers/create','create')->name('customers.create');
    Route::get('customers/store', 'store')->name('customers.store');
    Route::get('customers/{customer}', 'show')->name('customers.show');
    Route::get('customers/{customer}/edit', 'edit')->name('customers.edit');
    Route::put('customers/{customer}', 'update')->name('customers.update');
    Route::delete('customers/{customer}', 'destroy')->name('customers.destroy');
});

Route::controller(CustomerPhoneController::class)->group(function(){
    Route::get('customerphones/index','index')->name('customerPhones.index');
    Route::get('customerphones/create','create')->name('customerPhones.create');
    Route::post('customerphones/store', 'store')->name('customerPhones.store');
    Route::get('customerphones/{customerphone}', 'show')->name('customerPhones.show');
    Route::get('customerphones/{customerphone}/edit', 'edit')->name('customerPhones.edit');
    Route::put('customerphones/{customerphone}', 'update')->name('customerPhones.update');
    Route::delete('customerphones/{customerphone}', 'destroy')->name('customerPhones.destroy');
});


Route::controller(TraderController::class)->group(function(){
    Route::get('traders/index','index')->name('traders.index');
    Route::get('traders/create','create')->name('traders.create');
    Route::get('traders/store', 'store')->name('traders.store');
    Route::get('traders/{trader}', 'show')->name('traders.show');
    Route::get('traders/{trader}/edit', 'edit')->name('traders.edit');
    Route::put('traders/{trader}', 'update')->name('traders.update');
    Route::delete('traders/{trader}', 'destroy')->name('traders.destroy');
});
//if the route is defined and it give an error not defined
// php artisan route:clear
// php artisan route:cache


Route::controller(StockController::class)->group(function(){
    Route::get('stocks/index','index')->name('stocks.index');
    Route::get('stocks/create','create')->name('stocks.create');
    Route::get('stocks/store', 'store')->name('stocks.store');
    Route::get('stocks/{stock}', 'show')->name('stocks.show');
    Route::get('stocks/{stock}/edit', 'edit')->name('stocks.edit');
    Route::put('stocks/{stock}', 'update')->name('stocks.update');
    Route::delete('stocks/{stock}', 'destroy')->name('stocks.destroy');
});

Route::controller(DeliveryManController::class)->group(function(){
    Route::get('deliverymen/index','index')->name('deliverymen.index');
    Route::get('deliverymen/create','create')->name('deliverymen.create');
    Route::get('deliverymen/store', 'store')->name('deliverymen.store');
    Route::get('deliverymen/{deliveryman}', 'show')->name('deliverymen.show');
    Route::get('deliverymen/{deliveryman}/edit', 'edit')->name('deliverymen.edit');
    Route::put('deliverymen/{deliveryman}', 'update')->name('deliverymen.update');
    Route::delete('deliverymen/{deliveryman}', 'destroy')->name('deliverymen.destroy');
});
Route::controller(CustomerOrderController::class)->group(function(){
    Route::get('customerorders/index','index')->name('customerorders.index');
    Route::get('customerorders/create','create')->name('customerorders.create');
    Route::get('customerorders/store', 'store')->name('customerorders.store');
    Route::get('customerorders/{customerorder}/edit', 'edit')->name('customerorders.edit');
    Route::put('customerorders/{customerorder}', 'update')->name('customerorders.update');
    Route::delete('customerorders/{customerorder}', 'destroy')->name('customerorders.destroy');
});


Route::controller(CustomerOrderStatusController::class)->group(function(){
    Route::get('customerorderstatuses/index','index')->name('customerorderstatuses.index');
    Route::get('customerorderstatuses/create','create')->name('customerorderstatuses.create');
    Route::get('customerorderstatuses/store', 'store')->name('customerorderstatuses.store');
    Route::get('customerorderstatuses/{customerorderstatus}/edit', 'edit')->name('customerorderstatuses.edit');
    Route::put('customerorderstatuses/{customerorderstatus}', 'update')->name('customerorderstatuses.update');
    Route::delete('customerorderstatuses/{customerorderstatus}', 'destroy')->name('customerorderstatuses.destroy');
});

Route::controller(StockStatusController::class)->group(function(){
    Route::get('stockstatuses/index','index')->name('stockstatuses.index');
    Route::get('stockstatuses/create','create')->name('stockstatuses.create');
    Route::get('stockstatuses/store', 'store')->name('stockstatuses.store');
    Route::get('stockstatuses/{stockstatus}/edit', 'edit')->name('stockstatuses.edit');
    Route::put('stockstatuses/{stockstatus}', 'update')->name('stockstatuses.update');
    Route::delete('stockstatuses/{stockstatus}', 'destroy')->name('stockstatuses.destroy');
});




Route::prefix('traderstatuses')->controller(TraderStatusController::class)->group(function(){
    Route::get('/', 'index')->name('traderstatuses.index');
    Route::get('/create', 'create')->name('traderstatuses.create');
    Route::post('/store', 'store')->name('traderstatuses.store');
    Route::get('/{traderstatus}/edit', 'edit')->name('traderstatuses.edit');
    Route::put('/{traderstatus}', 'update')->name('traderstatuses.update');
    Route::delete('/{traderstatus}', 'destroy')->name('traderstatuses.destroy');
});
