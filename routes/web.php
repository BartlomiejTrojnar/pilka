<?php
Route::get('/', 'CountryController@index');

Route::resource('/panstwo', 'CountryController');
Route::get('/panstwo/order/{column}', 'CountryController@order')->name('panstwo.order');
Route::get('/panstwo/{id}/{view?}', 'CountryController@show');

Route::get('/sedzia/{id}/edit', 'RefereeController@edit')->name('sedzia.edit');
Route::resource('/sedzia', 'RefereeController');
Route::get('/sedzia/orderBy/{column}', 'RefereeController@orderBy')->name('sedzia.orderBy');
Route::post('/sedzia/refreshRow', 'RefereeController@refreshRow');

Route::resource('/stadion', 'StadiumController');
Route::post('/stadion/refreshRow', 'StadiumController@refreshRow');
Route::get('/stadion/order/{column}', 'StadiumController@order')->name('stadion.order');
Route::get('/stadion/{id}/{view?}', 'StadiumController@show');

Route::post('/club/refreshRow', 'ClubController@refreshRow');
Route::resource('/klub', 'ClubController');
Route::get('/club/orderBy/{column}', 'ClubController@orderBy')->name('club.orderBy');
Route::get('/klub/{id}/{view?}', 'ClubController@show');

Route::get('/rozgrywki/create', 'CompetitionController@create');
Route::resource('/rozgrywki', 'CompetitionController');
Route::get('/rozgrywki/order/{column}', 'ClubController@order')->name('rozgrywki.order');

Route::resource('/zawodnik', 'PlayerController');
Route::get('/zawodnik/order/{column}', 'PlayerController@order')->name('zawodnik.order');