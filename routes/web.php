<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => '/admin', 'roles' => ['admin'], 'middleware' => ['auth', 'roles'], 'as' => 'admin.' ], function() {
	Route::get('/', 'AdminController@index')->name('dashboard');
	
	Route::get('/list', 'ListingController@create')->name('list.create');
	Route::post('/list', 'ListingController@store')->name('list.store');

});

Route::group(['roles' => ['user'], 'middleware' => ['auth', 'roles']], function(){
	Route::get('/home', 'HomeController@index')->name('home');
});