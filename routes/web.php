<?php

use Illuminate\Support\Facades\Route;
use App\Models\Person;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\FalmilyController;
use App\Http\Controllers\DeclairationController;

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
    return view('welcome');
});

/*
Method | Url                  | function |  Route Name     |
-----------------------------------------------------------|
GET    | /people              | index   |   people.index   |
GET    | /people/create	      | create  |	people.create  |
POST   | /people	          | store   |	people.store   |
GET	   | /people/{photo}	  | show    |	people.show    |
GET	   | /people/{photo}/edit |	edit    |	people.edit    |
PUT    | /people/{photo}	  | update  |	people.update  |
DELETE | /people/{photo}	  | destroy |	people.destroy |
*/

Route::resource('people', PersonController::class);
Route::resource('falmilies', FalmilyController::class);
Route::resource('declairations', DeclairationController::class);