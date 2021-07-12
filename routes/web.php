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
    Route::get('/view-posts', 'AdminController@viewPosts')->name('admin.viewPosts');
    Route::post('/post-status-change', 'AdminController@postStatusChange')->name('admin.postStatusChange');
    Route::post('/post-delete','AdminController@postDelete')->name('admin.postDelete');
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

//---------------------------- PASSWORD RESET BEGIN ------------------------------------------------
Route::get('/password-reset', 'Auth\ResetPasswordController@showResetPassword')->name('auth.reset_password');
Route::post('/password-reset', 'Auth\ResetPasswordController@resetPassword')->name('auth.reset_password');
Route::get('/password-reset/{token}', 'Auth\ResetPasswordController@showResetPasswordForm')->name('auth.reset_password_login');
Route::post('/password-reset/{token}', 'Auth\ResetPasswordController@resetPasswordForm')->name('auth.reset_password_login');
//---------------------------- PASSWORD RESET END --------------------------------------------------

