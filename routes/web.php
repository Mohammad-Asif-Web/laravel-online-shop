<?php

use App\Http\Controllers\Admin\AdminAuthenticationController;
use App\Http\Controllers\Admin\BackendController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[FrontendController::class, 'index'])->name('front.home');



Route::group(['prefix'=>'admin'],function(){

    Route::group(['middleware'=>'admin.guest'], function(){
        Route::get('/login',[AdminAuthenticationController::class, 'login'])->name('admin.login');
        Route::post('/login',[AdminAuthenticationController::class, 'store'])->name('admin.store');
    });

      Route::group(['middleware'=>'admin.auth'], function(){
        Route::get('/logout',[AdminAuthenticationController::class, 'logout'])->name('admin.logout');

        Route::get('/dashboard',[BackendController::class, 'index'])->name('admin.index');
        
    });


});





