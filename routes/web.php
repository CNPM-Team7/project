<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DeclarationController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\PersonController;
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


//Route::middleware('guest')->
Route::name('auth.')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])
        ->name('login.create');

    Route::post('/login', [LoginController::class, 'login'])
        ->name('login');

    Route::get('/register', function () {
        return view('authenticate.register');
    })->name('register.create');

    Route::post('/register', [RegisterController::class, 'register'])
        ->name('register');
});

//Route::middleware('auth:web')->group(function () {

Route::get('', [PersonController::class, 'dashboard']);
Route::get('/dashboard', [PersonController::class, 'dashboard'])->name('dashboard');

Route::get('/profile', function () {
    return view('authenticate.profile');
})->name('profile');

Route::get('/staying', function () {
    return view('person.staying');
})->name('staying.create');

Route::post('/staying',
    [PersonController::class, 'staying']
)->name('staying.store');

Route::get('/absent', function () {
    return view('person.absent');
})->name('absent');

Route::post('/absent', [PersonController::class, 'absent'])->name('absent.store');


Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::resource('person', PersonController::class);

Route::name('families.')->prefix('families')->group(function () {
    Route::get('/split', [FamilyController::class, 'splitView'])->name('splitView');
    Route::get('/members/{id}', [FamilyController::class, 'members']);
    Route::post('/split', [FamilyController::class, 'split']);
}); // must declare these routes before resource routes

Route::resource('families', FamilyController::class);

Route::get('/declarations/create/{id}', [DeclarationController::class, 'create'])->name('declarations.create');

Route::resource('declarations', DeclarationController::class)->except(['create']);
//});
