<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::resource('/', 'HomeController');

Route::resource('/personne', 'PersonneController');

Route::get('/personne/{personne}/routine', 'PersonneController@routine')
    ->name('personne.routine');

Route::resource('/probleme', 'ProblemeController');

Route::resource('/partenaire', 'PartenaireController');

Route::resource('/configuration', 'ConfigurationController');

Route::resource('/exportation', 'ExportationController');

Route::resource('/statistique', 'StatistiqueController');

Route::get('/ajax/{categorie}/{type}', 'AjaxController@configTab')
    ->name('ajax.configTab');