<?php

Route::get('/test', 'TestController@index')
    ->name('test.index');
/*
Route::post('/test', 'TestController@form')
    ->name('test.form');

*/


Route::get('/graphe', 'GrapheController@grapheTest')
    ->name('graphe.graphe');