<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PropertyController;
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
    return view('home');
});


//admin
Route::prefix('admin')->group(function () {
    Route::get('login', function(){
        return view('admin.login');
    })->name('login');
    Route::post('login', [AdminController::class, 'login']);
    Route::get('logout', [AdminController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function(){
        Route::name('admin.')->group(function () {
            Route::controller(AdminController::class)->group(function(){
                Route::get('/', 'index')->name('index');
            });
            Route::resource('properties', PropertyController::class);
        });
    });
});