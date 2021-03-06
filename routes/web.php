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

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [App\Http\Controllers\Admin\MainController::class, 'index'])->name('home');
    Route::resource('role', \App\Http\Controllers\Admin\RoleController::class);
    Route::resource('permission', \App\Http\Controllers\Admin\PermissionController::class);
    Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('product', \App\Http\Controllers\Admin\ProductController::class);
    Route::resource('room',\App\Http\Controllers\Admin\RoomController::class);
    Route::resource('category',\App\Http\Controllers\Admin\CategoryController::class);

    Route::get('/manage',[\App\Http\Controllers\Admin\ManageController::class,'index'])->name('manageIndex');
    Route::get('/manage/open/{id}',[\App\Http\Controllers\Admin\ManageController::class,'open'])->name("manageOpen");
    Route::get('/manage/cloze/{id}',[\App\Http\Controllers\Admin\ManageController::class,'cloze'])->name("manageCloze");
    Route::get('/manage/clozepackage/{id}',[\App\Http\Controllers\Admin\ManageController::class,'clozepackage'])->name("manageClozePackage");
    Route::post("/add/package",[\App\Http\Controllers\Admin\ManageController::class,'addPackage'])->name("addPackage");
    Route::get("/delete/order/{id}",[\App\Http\Controllers\Admin\ManageController::class,'delete'])->name('deleteOrder');
});
