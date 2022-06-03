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

Route::middleware(['guest'])->group(function () {
    Route::get('/', 'PublicController@homepage')
        ->name('publichomepage');
});

Route::get('/faq', "PublicController@faq")
    ->name('faq');

Route::get('/login', "PublicController@login")
    ->name('login');

Route::get('/who', 'PublicController@who')
    ->name('who');

Route::get('/privacy', 'PublicController@priv')
    ->name('priv');


/*
|--------------------------------------------------------------------------
| Dynamic Routes
|--------------------------------------------------------------------------
|
| Routes that change its content dynamically based on the user
| authorization level
|
*/

Route::get('/catalog', "PublicController@catalog")
    ->name('catalog');
Route::get('/', 'HomeController@index')
    ->name('homepage');
Route::get('/chat/v2/{chatId?}', 'ChatController@getChat')
        ->name('chat');
Route::post('/chat/v2/{chatId}/send', 'ChatController@sendMessage')
	->name('chat.send');

/*
|--------------------------------------------------------------------------
| Level 2 Routes
|--------------------------------------------------------------------------
*/


Route::get('/lore', 'LocatoreController@index')
        ->name('lore');
Route::get('/lore/me', 'LocatoreController@profileLocatore')
        ->name('lore.me');

Route::get('/lore/accom/details/{accomId}', 'LocatoreController@detailsLocatore')
        ->name('lore.accom.details');

Route::get('/lore/accom/new', 'LocatoreController@newaccom')
        ->name('lore.accom.new');
Route::post('/lore/accom/new/submit', "LocatoreController@insertNewAccom")
        ->name('lore.accom.new.submit');



// OBSOLETE
Route::get('/profile/locatore', 'LocatoreController@profileLocatore')
        ->name('profileLocatore');
// OBSOLETE
Route::get('/details/locatore/{accomId}', 'LocatoreController@detailsLocatore')
        ->name('detailsLocatore');

/*
|--------------------------------------------------------------------------
| Level 3 Routes
|--------------------------------------------------------------------------
*/

Route::get('/lario', 'LocatarioController@index')
        ->name('lario');
Route::get('/lario/me', 'LocatarioController@profileLocatario')
        ->name('lario.me');
Route::get('/lario/accom/details/{accomId}', 'LocatarioController@detailsLocatario')
        ->name('lario.accom.details');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin', "AdminController@index")
        ->name('admin');

Route::get('/admin/stats', "AdminController@statistics")
        ->name('admin.stats');

Route::get('/admin/stats/search', "AdminController@stats")
        ->name('admin.stats.search');


Route::get('/admin/catalog','AdminController@catalog')
        ->name('admin.catalog');

Route::get('/admin/faq', 'AdminController@faqs')
        ->name('admin.faq');

Route::post('/admin/faq/add', 'AdminController@addfaq')
        ->name('admin.faq.add');

// TOGLIERE COMMENTI QUANDO SARANNO PRONTI I METODI
//Route::post('/admin/faq/remove', 'AdminController@removefaq')
//        ->name('admin.faq.remove');

//Route::post('/admin/faq/edit', 'AdminController@editfaq')
//        ->name('admin.faq.edit');


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', 'Auth\LoginController@showLoginForm')
        ->name('login');

Route::post('/login', 'Auth\LoginController@login');

Route::post('/logout', 'Auth\LoginController@logout')
        ->name('logout');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');

Route::post('/register', 'Auth\RegisterController@register');


