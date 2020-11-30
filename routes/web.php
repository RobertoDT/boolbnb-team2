<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

//rotte protette da autenticazione
Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware('auth')->group(function () {

  Route::resource("properties", "PropertyController");
});

Route::resource("properties", "PropertyController");

Route::get('/', 'PropertyController@index')->name('properties.index');

Route::get('/home', 'HomeController@index')->name('home');

//route for search page

Route::get('/search', 'PropertiesSearchController@index')->name('search');
