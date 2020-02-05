<?php

Route::middleware('auth')->group(function () {

    Route::resource('/configuration', 'ConfigurationController');

    Route::get('/configuration/{action}/{configuration}', 'ConfigurationController@modal')
        ->name('configuration.modal');

    Route::get('/configuration/content/{title}', 'ConfigurationController@content')
        ->name('configuration.content');

});