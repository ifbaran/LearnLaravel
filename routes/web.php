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

Route::get('/', 'HomeController@index')->name("index");
Route::get('/contact', 'HomeController@contact')->name("contact");
Route::get('/about', 'AboutController@index')->name("about");

Route::prefix("admin")->middleware("auth")->group(function ()
{
    Route::get('/', 'AdminController@index')->name('admin.index')->middleware('auth');
    Route::get('/add-post', 'AdminController@showAddPost')->name('admin.showAddPost');
    Route::post('/add-post','AdminController@addPost')->name('admin.addPost');
});

Route::get('/','SendParameterController@index')->name('admin.sendParameter');


