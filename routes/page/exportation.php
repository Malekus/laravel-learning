<?php

Route::middleware('auth')->group(function () {

    Route::get('/exportation', 'ExportationController@index')
        ->name('exportation.index');

    Route::get('/exportation/exportExcel/{date}/{model}', 'ExportationController@exportExcel')
        ->name('exportation.exportExcel');

});