<?php

Route::resource('/', 'HomeController');

Route::resource('/partenaire', 'PartenaireController');

Route::resource('/exportation', 'ExportationController');

Route::resource('/statistique', 'StatistiqueController');
