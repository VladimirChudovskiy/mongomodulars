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

Route::resource('users', 'UserController');
Route::group(['prefix' => 'users/{id}'], function () {
    Route::get('delete', 'UserController@destroy')->name('users.delete');
    Route::group(['prefix' => 'partner'], function () {
        Route::get('/', 'PartnerController@show')->name('partner.show');
        Route::get('enable', 'PartnerController@enable')->name('partner.enable');
        Route::get('disable', 'PartnerController@disable')->name('partner.disable');

        Route::resource('contacts', 'ContactController');
    });
});

Route::get('partners', 'PartnerController@index')->name('partner.index');



//Route::get('users/{id}/partner')->name('users.partner.index');


