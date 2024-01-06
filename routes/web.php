<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
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

Auth::routes();
Route::get('/', [HomeController::class, 'publicPage'])->name('welcome');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('admin', AdminController::class);
    Route::resource('articles', ArticleController::class); // Ruta de resurse va genera CRUD URI
    Route::resource('roles', RoleController::class); // Ruta de resurse va genera CRUD URI
    Route::resource('categories', CategoryController::class); // Ruta de resurse va genera CRUD URI
    Route::resource('userCategories', UserCategoryController::class); // Ruta de resurse va genera CRUD URI
});
