<?php
Route::get('/', 'CountryController@index');

Route::resource('/panstwo', 'CountryController');
Route::get('/panstwo/order/{column}', 'CountryController@order')->name('panstwo.order');
Route::get('/panstwo/{id}/{view?}', 'CountryController@show');

Route::resource('/sedzia', 'RefereeController');
Route::get('/sedzia/order/{column}', 'RefereeController@order')->name('sedzia.order');

Route::resource('/stadion', 'StadiumController');
Route::get('/stadion/order/{column}', 'StadiumController@order')->name('stadion.order');

Route::resource('/klub', 'ClubController');
Route::get('/klub/order/{column}', 'ClubController@order')->name('klub.order');
Route::get('/klub/{id}/{view?}', 'ClubController@show');

Route::resource('/rozgrywki', 'CompetitionController');
Route::get('/rozgrywki/order/{column}', 'ClubController@order')->name('rozgrywki.order');

Route::resource('/zawodnik', 'PlayerController');
Route::get('/zawodnik/order/{column}', 'PlayerController@order')->name('zawodnik.order');