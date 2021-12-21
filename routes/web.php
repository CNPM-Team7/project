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

/*
+--------+-----------+---------------------------------+----------------------+------------------------------------------------------------+------------------------------------------+
| Domain | Method    | URI                             | Name                 | Action                                                     | Middleware                               |
+--------+-----------+---------------------------------+----------------------+------------------------------------------------------------+------------------------------------------+
|        | GET|HEAD  | /                               |                      | Closure                                                    | web                                      |
|        | GET|HEAD  | api/user                        |                      | Closure                                                    | api                                      |
|        |           |                                 |                      |                                                            | App\Http\Middleware\Authenticate:sanctum |
|        | POST      | declarations                    | declarations.store   | App\Http\Controllers\DeclarationController@store           | web                                      |
|        | GET|HEAD  | declarations                    | declarations.index   | App\Http\Controllers\DeclarationController@index           | web                                      |
|        | GET|HEAD  | declarations/create             | declarations.create  | App\Http\Controllers\DeclarationController@create          | web                                      |
|        | DELETE    | declarations/{declaration}      | declarations.destroy | App\Http\Controllers\DeclarationController@destroy         | web                                      |
|        | PUT|PATCH | declarations/{declaration}      | declarations.update  | App\Http\Controllers\DeclarationController@update          | web                                      |
|        | GET|HEAD  | declarations/{declaration}      | declarations.show    | App\Http\Controllers\DeclarationController@show            | web                                      |
|        | GET|HEAD  | declarations/{declaration}/edit | declarations.edit    | App\Http\Controllers\DeclarationController@edit            | web                                      |
|        | POST      | families                        | families.store       | App\Http\Controllers\FamilyController@store                | web                                      |
|        | GET|HEAD  | families                        | families.index       | App\Http\Controllers\FamilyController@index                | web                                      |
|        | GET|HEAD  | families/create                 | families.create      | App\Http\Controllers\FamilyController@create               | web                                      |
|        | GET|HEAD  | families/{family}               | families.show        | App\Http\Controllers\FamilyController@show                 | web                                      |
|        | PUT|PATCH | families/{family}               | families.update      | App\Http\Controllers\FamilyController@update               | web                                      |
|        | DELETE    | families/{family}               | families.destroy     | App\Http\Controllers\FamilyController@destroy              | web                                      |
|        | GET|HEAD  | families/{family}/edit          | families.edit        | App\Http\Controllers\FamilyController@edit                 | web                                      |
|        | POST      | person                          | person.store         | App\Http\Controllers\PersonController@store                | web                                      |
|        | GET|HEAD  | person                          | person.index         | App\Http\Controllers\PersonController@index                | web                                      |
|        | GET|HEAD  | person/create                   | person.create        | App\Http\Controllers\PersonController@create               | web                                      |
|        | DELETE    | person/{person}                 | person.destroy       | App\Http\Controllers\PersonController@destroy              | web                                      |
|        | PUT|PATCH | person/{person}                 | person.update        | App\Http\Controllers\PersonController@update               | web                                      |
|        | GET|HEAD  | person/{person}                 | person.show          | App\Http\Controllers\PersonController@show                 | web                                      |
|        | GET|HEAD  | person/{person}/edit            | person.edit          | App\Http\Controllers\PersonController@edit                 | web                                      |
|        | GET|HEAD  | sanctum/csrf-cookie             |                      | Laravel\Sanctum\Http\Controllers\CsrfCookieController@show | web                                      |
+--------+-----------+---------------------------------+----------------------+------------------------------------------------------------+------------------------------------------+
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

    Route::get('', function (){
        return view('dashboard');
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');

    Route::resource('person', PersonController::class);

    Route::name('families.')->prefix('families')->group(function () {
        Route::get('/split', [FamilyController::class, 'splitView'])->name('splitView');
        Route::get('/members/{id}', [FamilyController::class, 'members']);
        Route::post('/split', [FamilyController::class, 'split']);
    }); // must declare these routes before resource routes
    
    Route::resource('families', FamilyController::class);
    
    Route::resource('declarations', DeclarationController::class);
//});
