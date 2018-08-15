<?php

Route::post('/personne', 'PersonneController@store')
    ->name('personne.store');

Route::get('/personne', 'PersonneController@index')
    ->name('personne.index');

Route::get('/personne/create', 'PersonneController@create')
    ->name('personne.create');

Route::put('/personne/{personne}', 'PersonneController@update')
    ->name('personne.update');

Route::delete('/personne/{personne}', 'PersonneController@destroy')
    ->name('personne.destroy');

Route::get('/personne/{personne}', 'PersonneController@show')
    ->name('personne.show')
    ->where('personne', '[0-9]+');

Route::get('/personne/{personne}/edit', 'PersonneController@edit')
    ->name('personne.edit');

Route::get('/personne/{personne}/routine', 'PersonneController@routine')
    ->name('personne.routine');

Route::post('/personne/list', 'PersonneController@list_')
    ->name('personne.list');
