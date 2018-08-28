<?php

Route::resource('/configuration', 'ConfigurationController');

Route::get('/configuration/{configuration}/{action}', 'ConfigurationController@modal')
    ->name('configuration.modal');

Route::get('/configuration/content/{title}', 'ConfigurationController@content')
    ->name('configuration.content');