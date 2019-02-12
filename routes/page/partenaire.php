<?php

Route::get('/partenaire', 'PartenaireController@index')
    ->name('partenaire.index');

Route::get('/partenaire/create', 'PartenaireController@create')
    ->name('partenaire.create');

Route::post('/partenaire/list', 'PartenaireController@list_')
    ->name('partenaire.list');

Route::get('/partenaire/{partenaire}', 'PartenaireController@show')
    ->name('partenaire.show')
    ->where('partenaire', '[0-9]+');