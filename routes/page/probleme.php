<?php

Route::get('/probleme', 'ProblemeController@index')
    ->name('probleme.index');

Route::post('/probleme/list', 'ProblemeController@list_')
    ->name('probleme.list');

Route::get('/probleme/{probleme}/{action}', 'ProblemeController@modal')
    ->name('probleme.modal')
    ->where('probleme', '[0-9]+')
    ->where('action', '[A-Za-z]+');

Route::get('/probleme/resoudre/{probleme}', 'ProblemeController@resoudre')
    ->name('probleme.resoudre')
    ->where('probleme', '[0-9]+');

Route::get('/probleme/edit/{probleme}', 'ProblemeController@edit')
    ->name('probleme.edit')
    ->where('probleme', '[0-9]+');

Route::get('/probleme/{probleme}', 'ProblemeController@show')
    ->name('probleme.show')
    ->where('probleme', '[0-9]+');

Route::get('/probleme/create/{personne}', 'ProblemeController@create')
    ->name('probleme.create')
    ->where('personne', '[0-9]+');

Route::post('/probleme/{personne}', 'ProblemeController@store')
    ->name('probleme.store')
    ->where('personne', '[0-9]+');


Route::put('/probleme/{probleme}', 'ProblemeController@update')
    ->name('probleme.update')
    ->where('probleme', '[0-9]+');

Route::delete('/probleme/{probleme}', 'ProblemeController@destroy')
    ->name('probleme.destroy')
    ->where('probleme', '[0-9]+');





