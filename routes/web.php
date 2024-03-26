<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Rute untuk registrasi dan login
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::resource('/addresses', AddressController::class)->names([
    'index' => 'address.index',
    'store' => 'address.store', 
]);

Route::resource('/contact', ContactController::class)->names([
    'index' => 'contact.index',
    'store' => 'contact.store',
]);

// Rute untuk User
Route::middleware('auth')->group(function () {
    Route::post('/update-user', [UserController::class, 'update']);
    Route::get('/get-user', [UserController::class, 'getUser']);
    Route::post('/logout', [UserController::class, 'logout']);
});

// Rute untuk Contact
Route::middleware('auth')->group(function () {
    Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/store-contact', [ContactController::class, 'store'])->name('store-contact');
    Route::get('/contact/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
    Route::put('/contact/{contact}', [ContactController::class, 'update'])->name('contact.update');
    Route::get('/contact/{id}', [ContactController::class, 'get']);
    Route::get('/search-contact', [ContactController::class, 'search'])->name('contact.search');
    Route::get('/contact/{id}/delete', [ContactController::class, 'delete'])->name('contact.delete');
});


// Rute untuk Address
Route::middleware('auth')->group(function () {
    Route::get('/address', [AddressController::class, 'index']);
    Route::get('/create-address', [AddressController::class, 'create'])->name('address.create');
    Route::get('/addresses/{id}/edit', [AddressController::class, 'edit'])->name('address.edit');
    Route::put('/addresses/{address}', [AddressController::class, 'update'])->name('address.update');
    Route::get('/address/{id}/delete', [AddressController::class, 'delete'])->name('address.delete');
    Route::get('/get-address/{id}', [AddressController::class, 'get']);
    Route::get('/list-address', [AddressController::class, 'list']);
    Route::post('/remove-address', [AddressController::class, 'remove']);
});

// Rute logout di luar grup middleware 'auth'
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route untuk halaman landing
Route::get('/', function () {
    return view('landing');
})->name('landing');
