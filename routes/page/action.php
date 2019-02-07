<?php

Route::get('/action', 'ActionController@index')
    ->name('action.index');

Route::get('/action/create/{probleme}', 'ActionController@create')
    ->name('action.create')
    ->where('probleme', '[0-9]+');

Route::post('/action', 'ActionController@store')
    ->name('action.store');

