<?php

Route::get('/action', 'ActionController@index')
    ->name('action.index');

Route::get('/action/create/{probleme}', 'ActionController@create')
    ->name('action.create')
    ->where('probleme', '[0-9]+');

Route::post('/action/{probleme}', 'ActionController@store')
    ->name('action.store')
    ->where('probleme', '[0-9]+');