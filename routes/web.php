<?php
Route::get('/', 'CountryController@index');

Route::resource('/panstwo', 'CountryController');
Route::get('/panstwo/orderBy/{column}', 'CountryController@orderBy');

Route::resource('/sedzia', 'RefereeController');
Route::resource('/stadion', 'StadiumController');
Route::resource('/zawodnik', 'PlayerController');
Route::resource('/klub', 'ClubController');
