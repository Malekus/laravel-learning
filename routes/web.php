<?php


Route::resource('/statistique', 'StatistiqueController');

Auth::routes(['register' => false]);

/*
Route::resource('/', 'HomeController');
Route::get('/home', 'HomeController@index')->name('home');
*/
