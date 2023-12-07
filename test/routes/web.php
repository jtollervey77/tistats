<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', 'App\Http\Controllers\MainController@index');
Route::get('/factions', 'App\Http\Controllers\FactionsController@index');
Route::get('/players', 'App\Http\Controllers\PlayersController@index');
Route::get('/events', 'App\Http\Controllers\EventsController@index');
Route::post('/event/update', 'App\Http\Controllers\EventsController@update');
Route::get('/strategy', 'App\Http\Controllers\StrategyController@index');

Route::get('/player/{id}', ['App\Http\Controllers\PlayerController', 'index']);
Route::get('/faction/{id}', ['App\Http\Controllers\FactionController', 'index']);
