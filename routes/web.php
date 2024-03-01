<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
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
    return view('welcome');
});


// Registration routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');

// Handle the submission of the form to create a category
Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');

Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');

Route::resource('category', CategoryController::class);

Route::resource('categories', CategoryController::class);

Route::resource('products', ProductController::class );

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/login', 'App\Http\Controllers\AuthController@login');
