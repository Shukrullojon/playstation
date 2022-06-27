<?php

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

Route::get('/', function () { return view('welcome'); });

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name("adminIndex");
    Route::resource('role', \App\Http\Controllers\Admin\RoleController::class);
    Route::resource('permission', \App\Http\Controllers\Admin\PermissionController::class);
    Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('product', \App\Http\Controllers\Admin\ProductController::class);
    Route::resource('room',\App\Http\Controllers\Admin\RoomController::class);

    Route::get('/manage',[\App\Http\Controllers\Admin\ManageController::class,'index'])->name('manageIndex');
});
