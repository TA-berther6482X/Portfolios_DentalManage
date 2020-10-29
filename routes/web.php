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

Route::get('/intro', 'HomeController@intro')->name('intro');
Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@index')->name('index');
});

Route::group(['prefix' => 'contact', 'middleware' => 'auth'], function() {
    Route::get('/', 'ContactFormController@create')->name('contact.create');
    Route::post('store', 'ContactFormController@store')->name('contact.store');
    Route::get('store', function() { return redirect('contact/'); });
});

Route::group(['prefix' => 'userinfo', 'middleware' => 'auth'], function() {
    Route::get('/', 'UserInfoController@show')->name('userinfo.show');
    Route::get('edit', 'UserInfoController@edit')->name('userinfo.edit');
    Route::post('update', 'UserInfoController@update')->name('userinfo.update');
    Route::get('update', function() { return redirect('userinfo/'); });
});

Route::group(['prefix' => 'toothcheck', 'middleware' => 'auth'], function() {
    Route::get('index', 'ToothController@index')->name('toothcheck.index');
    Route::post('store', 'ToothController@store')->name('toothcheck.store');
    Route::get('store', function() { return redirect('toothcheck/'); });
    Route::get('show/{id}', 'ToothController@show')->name('toothcheck.show');
});

Route::group(['prefix' => 'reservation', 'middleware' => 'auth'], function() {
    Route::get('/', 'ReservationController@index')->name('reservation.index');
    Route::get('show', 'ReservationController@show')->name('reservation.show');
    Route::post('store', 'ReservationController@store')->name('reservation.store');
    Route::get('store', function() { return redirect('reservation/'); });
    Route::post('destroy/{id}', 'ReservationController@destroy')->name('reservation.destroy');
    Route::get('destroy/{id}', function() { return redirect('reservation/'); });
});

Auth::routes();


