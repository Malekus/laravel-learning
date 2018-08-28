<?php

Route::get('/probleme', 'ProblemeController@index')
    ->name('probleme.index');

Route::post('/probleme/{personne}', 'ProblemeController@store')
    ->name('probleme.store');

Route::get('/probleme/{personne}/create', 'ProblemeController@create')
    ->name('probleme.create');

Route::put('/probleme/{probleme}', 'ProblemeController@update')
    ->name('probleme.update');

Route::delete('/probleme/{probleme}', 'ProblemeController@destroy')
    ->name('probleme.destroy');

Route::get('/probleme/{probleme}', 'ProblemeController@show')
    ->name('probleme.show')
    ->where('probleme', '[0-9]+');

Route::get('/probleme/{probleme}/edit', 'ProblemeController@edit')
    ->name('probleme.edit');

Route::get('/probleme/{probleme}/routine', 'ProblemeController@routine')
    ->name('probleme.routine');

Route::post('/probleme/list', 'ProblemeController@list_')
    ->name('probleme.list');

Route::get('/probleme/{probleme}/{action}', 'ProblemeController@modal')
    ->name('probleme.modal');
