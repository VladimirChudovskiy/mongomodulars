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

Route::group(['prefix' => 'users/{uid}/partner'], function () {
    Route::group(['prefix' => 'services'], function(){
        Route::get('/', 'ServiceController@index')->name('services.index');
        Route::get('create', 'ServiceController@create')->name('services.create');
        Route::post('store', 'ServiceController@store')->name('services.store');
    });
    Route::group(['prefix' => 'ecbs'], function(){
        Route::get('/', 'EcbController@index')->name('ecbs.index');
        Route::get('create', 'EcbController@create')->name('ecbs.create');
        Route::post('store', 'EcbController@store')->name('ecbs.store');
    });
});

Route::group(['prefix' => 'services/{id}'], function () {
    Route::get('/', 'ServiceController@show')->name('services.show');
    Route::group(['prefix' => 'ports'], function () {
        Route::get('/', 'ServiceController@ports')->name('services.ports');
        Route::post('store', 'ServiceController@portStore')->name('services.ports.store');
        Route::get('{system}/connect', 'ServiceController@portConnect')->name('services.ports.connect');
        Route::get('{system}/do-connect/{rel_id}/{rel_port_system}', 'ServiceController@portDoConnect')->name('services.ports.do_connect');
        Route::get('{system}/disconnect', 'ServiceController@portDisconnect')->name('services.ports.disconnect');
    });
    Route::group(['prefix' => 'commands'], function () {
        Route::get('/', 'ServiceController@commands')->name('commands.index');
        Route::get('create', 'ServiceController@createCommand')->name('commands.create');
        Route::post('store', 'ServiceController@storeCommand')->name('commands.store');
        Route::get('{cid}/edit', 'ServiceController@editCommand')->name('commands.edit');
    });

    Route::get('delete', 'ServiceController@destroy')->name('services.delete');
    Route::get('qr', 'ServiceController@qr')->name('services.qr');
});

Route::group(['prefix' => 'ecbs/{id}'], function () {
    Route::get('/', 'EcbController@show')->name('ecbs.show');
    Route::get('delete', 'EcbController@destroy')->name('ecbs.delete');
    Route::group(['prefix' => 'ports'], function () {
        Route::get('/', 'EcbController@ports')->name('ecbs.ports');
        Route::post('store', 'EcbController@portStore')->name('ecbs.ports.store');
    });
});



