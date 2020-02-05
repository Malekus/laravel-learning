<?php


Route::middleware('auth')->group(function () {

    Route::get('/test', 'TestController@index')
        ->name('test.index');

    Route::get('/graphe', 'GrapheController@grapheTest')
        ->name('graphe.graphe');

});