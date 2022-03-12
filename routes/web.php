<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\SiteController;
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

// Route::get('dev', function(){
//     $res = Http::get('http://indonesian-area.herokuapp.com/api/city/?id_province=51');
//     dd($res->json());
// });

Route::controller(SiteController::class)->group(function(){
    Route::get('/', 'index')->name('home');
    Route::get('properties', 'allProperty')->name('properties');
    Route::get('property/{id}', 'property')->name('property');
    Route::post('property/{id}', 'propertyView')->name('property.view');

    Route::post('book-property/{id}', 'bookProperty')->name('book.property');

    Route::get('about', 'about')->name('about');
    Route::get('contact', 'contact')->name('contact');
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
                Route::get('pesanan', 'pesanan')->name('pesanan');
                Route::patch('pesanan/approve/{id}', 'approvePesanan')->name('pesanan.approve');
                Route::delete('pesanan/delete/{id}', 'deletePesanan')->name('pesanan.delete');
            });
            Route::resource('banner', BannerController::class)->except('show');

            Route::delete('properties/image/', [PropertyController::class, 'deleteImage'])->name('properties.image.delete');
            Route::resource('properties', PropertyController::class);
        });
    });
});