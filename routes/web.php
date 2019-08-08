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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['namespace' => 'Reklama', 'prefix' => '/reklama/'],function(){
    Route::resource('/','ReklamaController')
        ->names('reklama');

    Route::get('/show/{id}','ReklamaController@show')
        ->name('reklama.show');

    Route::get('/message','ReklamaController@message')
        ->name('reklama.message');
    Route::post('/messageSend','ReklamaController@messageSend')
        ->name('reklama.messageSend');
    Route::get('/declineChannel','ReklamaController@declineChannel')
        ->name('reklama.declineChannel');

    Route::get('/indexDecline','ReklamaController@indexDecline')
        ->name('reklama.indexDecline');
    Route::get('/indexAccept','ReklamaController@indexAccept')
        ->name('reklama.indexAccept');
    Route::get('/indexWait','ReklamaController@indexWait')
        ->name('reklama.indexWait');

});


