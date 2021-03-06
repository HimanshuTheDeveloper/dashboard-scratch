<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth' , 'admin'])->group(function () {

    // Registered  User 
    
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/role-register',[App\Http\Controllers\admin\DashboardController::class, 'registered']);
    Route::get('/role-edit/{id}',[App\Http\Controllers\admin\DashboardController::class, 'registeredEdit']);
    Route::put('/role-register-update/{id}' , [App\Http\Controllers\admin\DashboardController::class, 'registeredUpdate']);
    Route::delete('/role-delete/{id}' , [App\Http\Controllers\admin\DashboardController::class, 'registeredDelete']);


    // Route related Product 
    Route::get('/products',[App\Http\Controllers\ProductController::class, 'index']);
    
    
    // Route related Product 
    Route::get('/bookings',[App\Http\Controllers\BookingController::class, 'index']);


});
