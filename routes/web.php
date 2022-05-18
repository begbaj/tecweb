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

Route::get('/', "PublicController@Homepage")
    ->name("homepage");

Route::get('/faq', "PublicController@Faq")
    ->name('faq');

Route::view('/login', "login")
    ->name('login');

Route::view('/who', 'public/who')
    ->name('who');

Route::get('/catalog', "PublicController@catalog")
    ->name('publicCatalog');

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


