<?php

Route::resource('/', 'HomeController');

Route::resource('/statistique', 'StatistiqueController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
