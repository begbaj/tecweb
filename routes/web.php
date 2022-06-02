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

Route::get('/priv', 'PublicController@priv')
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
Route::get('/lore/new', 'LocatoreController@newaccom')
        ->name('lore.new');
Route::post('/lore/new/submit', "LocatoreController@insertNewAccom")
        ->name('lore.new.submit');
Route::get('/lore/me', 'LocatoreController@profileLocatore')
        ->name('lore.me');
Route::get('/lore/accom/{accomId}', 'LocatoreController@detailsLocatore')
        ->name('lore.accom');


//Route::get('/chat/locatore/{chatId?}', 'LocatoreController@chatLocatore')
//       ->name('chatLocatore');
//Route::post('/chat/locatore/send/{chatId}', 'LocatoreController@sendMessage')
//	 ->name('chatLocatore.send');

// OBSOLETE
Route::get('/profile/locatore', 'LocatoreController@profileLocatore')
        ->name('profileLocatore');
// OBSOLETE
Route::get('/details/locatore/{accomId}', 'LocatoreController@detailsLocatore')
        ->name('detailsLocatore');
// OBSOLETE
Route::get('/locatore', 'LocatoreController@index')
        ->name('locatore');
// OBSOLETE
Route::get('/newaccom', 'LocatoreController@newaccom')
        ->name('newaccom');
//OBSOLETE
Route::post('/newaccom/submit', "LocatoreController@insertNewAccom")
        ->name('insertaccom');

/*
|--------------------------------------------------------------------------
| Level 3 Routes
|--------------------------------------------------------------------------
*/

Route::get('/locatario', 'LocatarioController@index')
        ->name('locatario');

Route::get('/profile/locatario', 'LocatarioController@profileLocatario')
        ->name('profileLocatario');

Route::get('/chat/locatario/{chatId?}', 'LocatarioController@chatLocatario')
        ->name('chatLocatario');

Route::post('/chat/locatario/send/{chatId}', 'LocatarioController@sendMessage')
	->name('chatLocatario.send');

Route::get('/details/locatario/{accomId}', 'LocatarioController@detailsLocatario')
        ->name('detailsLocatario');
	
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin', "AdminController@index")
        ->name('admin');

Route::get('/stats', "AdminController@stats")
        ->name('stats');

Route::get('/statistics', "AdminController@statistics")
        ->name('statistics');

Route::get('/gestionefaqs', 'AdminController@faqs')
        ->name('gestionefaqs');

Route::post('/addfaqs', 'AdminController@addfaq')
        ->name('addfaq');

Route::get('/admcat','AdminController@catalog')->name('admcat');

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


