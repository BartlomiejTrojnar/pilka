<?php
Route::get('/', 'CountryController@index');

Route::resource('/panstwo', 'CountryController');
Route::get('/panstwo/orderBy/{column}', 'CountryController@orderBy')->name('panstwo.orderBy');

Route::resource('/sedzia', 'RefereeController');
Route::resource('/stadion', 'StadiumController');
Route::resource('/zawodnik', 'PlayerController');
Route::resource('/klub', 'ClubController');
Route::get('/klub/orderBy/{column}', 'ClubController@orderBy')->name('klub.orderBy');
