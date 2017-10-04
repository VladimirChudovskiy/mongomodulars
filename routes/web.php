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

//Route::get('/', function () {
//
//    $user = \App\Modules\Acl\Models\User::first();
//
//    dd($user);
//
//    $obj = (object) [
//        'name' => 'Vova',
//        'soname' => 'HHH',
//        'soname_en' => 'Chudovskiy',
//        'soname_etl' => 'Chudovskiy etl',
//        'lastname' => 'V',
//        'lastname_etl' => 'Viktorovich',
//        'lastname_en' => 'Viktor',
//        'lastname_ru' => 'Викторович',
//    ];
//
//    dd(t($obj, 'lastname', 'en'));
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
