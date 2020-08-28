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

Route::get('/', function () {
    return view('welcome');
});

Route::get('chat', 'ChatController@chat');
Route::post('/send/{session}', 'ChatController@send');
Route::post('saveToSession', 'ChatController@saveToSession');
Route::post('getOldMessages', 'ChatController@getOldMessages');
Route::post('deleteSession', 'ChatController@deleteSession');
Route::get('check', function(){
    return session('chat');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/session/create', 'SessionController@create');
Route::post('/session/{session}/chats', 'ChatController@chats');
Route::post('/session/{session}/read', 'ChatController@read');
Route::post('/session/{session}/clear', 'ChatController@clear');
Route::post('/session/{session}/block', 'BlockController@block');
Route::post('/session/{session}/unblock', 'BlockController@unblock');
