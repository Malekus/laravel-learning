<?php


Route::get('/action/create/{probleme}', 'ActionController@create')
    ->name('action.create')
    ->where('probleme', '[0-9]+');

Route::post('/action', 'ActionController@store')
    ->name('action.store');

Route::get('/action/{id}/{action}', 'ActionController@modal')
    ->name('action.modal')
    ->where('id', '[0-9]+')
    ->where('action', '[A-Za-z]+');

Route::put('/action/{action}', 'ActionController@update')
    ->name('action.update')
    ->where('action', '[0-9]+');