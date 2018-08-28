<?php
Route::get('/test', 'TestController@index')
    ->name('test.index');

Route::post('/test', 'TestController@form')
    ->name('test.form');