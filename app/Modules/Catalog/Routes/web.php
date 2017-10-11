<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::resource('areas', 'AreaController');
Route::group(['prefix' => 'areas/{id}'], function () {
    Route::get('delete', 'AreaController@destroy')->name('areas.delete');
});


