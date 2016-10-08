<?php

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

Route::post('/guests', 'API\GuestController@store')->middleware(['auth:api']);
Route::get('/guests', 'API\GuestController@index')->middleware(['auth:api']);
Route::post('/guests/{guest}/invite', 'API\InviteController@invite')->middleware(['auth:api']);

Route::post('/messages', 'API\MessageController@store');

Route::get('/painel/latest', 'API\PainelController@lastest');
Route::get('/painel/new', 'API\PainelController@new');
Route::post('/painel/stars', 'API\PainelController@storeStars');