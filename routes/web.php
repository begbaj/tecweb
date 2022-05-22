<?php

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
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/


Route::get('/faq', "PublicController@faq")
    ->name('faq');

Route::get('/login', "PublicController@login")
    ->name('login');

Route::get('/signin', "PublicController@signin")
    ->name('signin');

Route::get('/who', 'PublicController@who')
    ->name('who');

Route::get('/home', 'PublicController@homepage')
    ->name('home');

/*
|--------------------------------------------------------------------------
| Dynamic Routes
|--------------------------------------------------------------------------
|
| Routes that change its content dynamically based on the user
| authorization level
|
*/

Route::get('/sitemap', "DynamicController@Sitemap");

Route::get('/catalog', "PublicController@catalog")
    ->name('catalog');

Route::get('/', "PublicController@homepage")
    ->name("homepage");

/*
|--------------------------------------------------------------------------
| Level 2 Routes
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Level 3 Routes
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/



