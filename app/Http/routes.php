<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    // Algemeen
    Route::get('/', 'HomeController@index');
    Route::get('/contact', 'HomeController@contact');

    // Locaties
    Route::get('/locatie/toevoegen', 'LocatieController@toevoegen');
    Route::put('/locatie/toevoegen', 'LocatieController@toevoegenPut');
    Route::get('/locaties', 'LocatieController@index');

    // Zoeken
    Route::get('/voorraad/zoeken', 'VoorraadController@zoeken');
    Route::post('/voorraad/zoeken', 'VoorraadController@zoeken');

    // Voorraad
    Route::get('/voorraad/locatie/{locatieCode?}', 'VoorraadController@locatie');
    Route::get('/voorraad/locatie/{locatieCode}/bewerken', 'VoorraadController@bewerken');
    Route::patch('/voorraad/locatie/{locatieCode}/bewerken', 'VoorraadController@bewerkenPatch');
    Route::get('/voorraad/locatie/{locatieCode}/verplaatsen', 'VoorraadController@verplaatsen');
    Route::patch('/voorraad/locatie/{locatieCode}/verplaatsen', 'VoorraadController@verplaatsenPatch');

    // Overige lijsten
    Route::get('/artikelen', 'ArtikelController@index');
    Route::get('/fabrieken', 'FabriekController@index');
    Route::get('/medewerkers', 'MedewerkerController@index');
});
