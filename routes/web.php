<?php

Route::group(['prefix' => 'panel', 'namespace' => 'Panel'], function () {
    Route::any('/brands/buscar', 'BrandController@search')->name("brands.search");
    Route::any('/brands/{brand}/planes', 'BrandController@planes')->name("brands.planes");
    Route::resource('/brands', 'BrandController');


    Route::any('/planes/buscar', 'PlaneController@search')->name("planes.search");
    Route::resource('/planes', 'PlaneController');


    Route::get('/states', 'StateController@index')->name("states.index");
    Route::post('/states/buscar', 'StateController@search')->name("states.search");


    Route::any('/state/{state}/cities/search', 'CityController@search')->name("states.cities.search");
    Route::get('/state/{state}/cities', 'CityController@index')->name("states.cities");


    Route::get('/', "PanelController@index")->name("home.panel");
});

Route::get('/', "Site\SiteController@index")->name("home-site");
Route::get('/promocoes', "Site\SiteController@promotions")->name('promotions');

Auth::routes();
