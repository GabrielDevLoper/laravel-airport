<?php

Route::group(['prefix' => 'panel', 'namespace' => 'Panel'], function () {
    Route::any('/brands/buscar', 'BrandController@search')->name("brands.search");
    Route::any('/brands/{brand}/planes', 'BrandController@planes')->name("brands.planes");
    Route::resource('/brands', 'BrandController');


    Route::any('/planes/buscar', 'PlaneController@search')->name("planes.search");
    Route::resource('/planes', 'PlaneController');


    Route::get('/', "PanelController@index")->name("home.panel");
});

Route::get('/', "Site\SiteController@index")->name("home-site");
Route::get('/promocoes', "Site\SiteController@promotions")->name('promotions');

Auth::routes();
