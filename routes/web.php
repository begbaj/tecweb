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

Route::get('/who', 'PublicController@who')
    ->name('who');

Route::get('/', "DynamicController@homepage")
    ->name("homepage");

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



/*
|--------------------------------------------------------------------------
| Level 2 Routes
|--------------------------------------------------------------------------
*/

Route::get('/locatore', 'LocatoreController@index')
        ->name('locatore');

/*
|--------------------------------------------------------------------------
| Level 3 Routes
|--------------------------------------------------------------------------
*/

Route::get('/locatario', 'LocatarioController@index')
        ->name('locatario');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin', "AdminController@index")
        ->name('admin');


// Rotte per l'autenticazione
Route::get('login', 'Auth\LoginController@showLoginForm')
        ->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');

// Rotte per la registrazione
Route::get('register', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');

Route::post('register', 'Auth\RegisterController@register');
