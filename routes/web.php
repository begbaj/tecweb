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

Route::get('/who', 'PublicController@who')
    ->name('who');

Route::get('/privacy', 'PublicController@priv')
    ->name('priv');

Route::get('/where', 'PublicController@where')
    ->name('where');



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

Route::get('/catalog/accom/{accomId}', "UserController@accomDetails")
    ->name('catalog.accom.details');

Route::get('/user/me', 'UserController@myProfile')
    ->name('user.me');

Route::get('/user/profile/{id}', 'UserController@strangerProfile')
        ->name('user.profile');

Route::post('/user/me/edit', "UserController@editProfile")
        ->name('user.me.edit');

Route::get('/', 'HomeController@index')
    ->name('homepage');

Route::get('/chat/{chatId?}', 'ChatController@getChat')
        ->name('chat');

Route::post('/chat/{chatId}/send', 'ChatController@sendMessage')
	->name('chat.send');

Route::get('chat/send/contract/{alloggioId}/{destinatarioId}', 'ChatController@generate_pdf')
        ->name('chat.contract');

/*
|--------------------------------------------------------------------------
| Level 2 Routes
|--------------------------------------------------------------------------
*/

Route::get('/locatore', 'LocatoreController@index')
        ->name('lore');

Route::get('/locatore/accom/new', 'LocatoreController@viewMakeAccom')
        ->name('lore.accom.new');

Route::post('/locatore/accom/new/submit', "LocatoreController@insertNewAccom")
        ->name('lore.accom.new.submit');

Route::get('/locatore/elimina/{id}', "LocatoreController@removeAccom")
        ->name('lore.accom.delete');

Route::get('/locatore/accom/edit/{id}', "LocatoreController@editAccom")
        ->name('lore.accom.edit');

Route::post('/locatore/accom/edit/confirm', "LocatoreController@confirmEdit")
        ->name('lore.accom.edit.confirm');
/*
|--------------------------------------------------------------------------
| Level 3 Routes
|--------------------------------------------------------------------------
*/

Route::get('/locatario', 'LocatarioController@index')
        ->name('lario');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin', "AdminController@index")
        ->name('admin');

Route::get('/admin/stats', "AdminController@statistics")
        ->name('admin.stats');

Route::get('/admin/stats/search', "AdminController@getStats")
        ->name('admin.stats.search');

Route::get('/admin/faq', 'AdminController@faqs')
        ->name('admin.faq');

Route::post('/admin/faq/add', 'AdminController@addfaq')
        ->name('admin.faq.add');

Route::get('/admin/faq/remove/{id}', 'AdminController@deletefaq')
        ->name('admin.faq.remove');

Route::post('/admin/faq/edit/{id}', 'AdminController@updateFaq')
        ->name('admin.faq.edit');

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


