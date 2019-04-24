<?php
Route::get('/', 'CountryController@index');

Route::resource('/panstwo', 'CountryController');
Route::get('/panstwo/orderBy/{column}', 'CountryController@orderBy')->name('panstwo.orderBy');
Route::get('/panstwo/{id}/{view?}', 'CountryController@show');

Route::resource('/sedzia', 'RefereeController');
Route::get('/sedzia/order/{column}', 'RefereeController@orderBy')->name('sedzia.order');

Route::resource('/stadion', 'StadiumController');
Route::resource('/zawodnik', 'PlayerController');
Route::resource('/klub', 'ClubController');
Route::get('/klub/orderBy/{column}', 'ClubController@orderBy')->name('klub.orderBy');
