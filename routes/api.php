<?php

use App\Http\Controllers\LocatoreController;
use App\Models\Resources\Servizio;
use App\Models\Resources\Messaggio;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('servs/{type?}', function ($type=null) {
    return Servizio::getServs($type);
})->name('api.servs');


