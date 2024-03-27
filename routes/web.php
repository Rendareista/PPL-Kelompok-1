<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AddressController; // Import AddressController

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
    return view('home', ['title' => 'Home']);
})->name('home');

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');

// Middleware group 'guest' for login and register routes
Route::middleware(['guest'])->group(function () {
    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::post('login', [UserController::class, 'login_action'])->name('login.action');
});

// Middleware group 'auth' for authenticated routes
Route::middleware(['auth'])->group(function () {
    // Route for creating and storing contact
    Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
    
    // Logout route
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
});

// Routes for address
Route::get('/address/create', [AddressController::class, 'create'])->name('address.create');
Route::post('/address/store', [AddressController::class, 'store'])->name('address.store');
