<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => '/admin', 'roles' => ['admin'], 'middleware' => ['auth', 'roles'], 'as' => 'admin.' ], function() {
	Route::get('/', 'AdminController@index')->name('dashboard');
	
	//List
	Route::get('/list', 'ListingController@create')->name('list.create');
	Route::post('/list', 'ListingController@store')->name('list.store');

	//List Group
	Route::get('/group', 'ListGroupController@create')->name('group.create');
	Route::post('/group', 'ListGroupController@store')->name('group.store');
	Route::get('/group/search', 'ListGroupController@search')->name('group.search');

	//collection
	Route::get('/collection', 'MyCollectionController@alLCollection')->name('collection.all');
	Route::post('/collection', 'MyCollectionController@store')->name('collection.store');

});

Route::group(['roles' => ['user'], 'middleware' => ['auth', 'roles']], function(){
	Route::get('/home', 'HomeController@index')->name('home');
});