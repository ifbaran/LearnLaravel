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
//---------------------------- HOME BEGIN ----------------------------------------------
Route::get('/', 'HomeController@index')->name("index")->middleware('auth');
Route::get('/contact', 'HomeController@contact')->name("contact")->middleware('auth');
//---------------------------- HOME END ------------------------------------------------

//---------------------------- ABOUT BEGIN ----------------------------------------------
Route::get('/about', 'AboutController@index')->name("about")->middleware('auth');
//---------------------------- ABOUT END ------------------------------------------------


//---------------------------- ADMIN BEGIN ----------------------------------------------
Route::prefix("admin")->middleware("auth")->group(function ()
{
    Route::get('/', 'AdminController@index')->name('admin.index')->middleware('auth');
    Route::get('/add-post', 'AdminController@showAddPost')->name('admin.showAddPost');
    Route::post('/add-post','AdminController@addPost')->name('admin.addPost');
    Route::get('/view-profile','AdminController@viewProfile')->name('admin.viewProfile');
    Route::put('/view-profile','AdminController@viewProfileUpdate')->name('admin.viewProfileUpdate');
});

Route::get('/sendParameter','SendParameterController@index')->name('admin.sendParameter')->middleware('auth');
//---------------------------- ADMIN END -------------------------------------------------

//---------------------------- LOGIN BEGIN ----------------------------------------------
Route::get('login','Auth\LoginController@showLogin')->name('login');
Route::post('login','Auth\LoginController@login');
//---------------------------- LOGIN END ------------------------------------------------

//---------------------------- LOGOUT BEGIN ----------------------------------------------
Route::get('logout','Auth\LoginController@logout')->name('logout')->middleware('auth');
//---------------------------- LOGOUT END ------------------------------------------------

