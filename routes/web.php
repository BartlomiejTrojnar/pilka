<?php
Route::get('/', 'CountryController@index');

Route::resource('/panstwo', 'CountryController');
Route::resource('/sedzia', 'RefereeController');
Route::resource('/stadion', 'StadiumController');
Route::resource('/zawodnik', 'PlayerController');
Route::resource('/klub', 'ClubController');
