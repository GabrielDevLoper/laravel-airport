<?php

Route::group(['prefix' => 'panel', 'namespace' => 'Panel'], function () {
    Route::any('/brands/buscar', 'BrandController@search')->name("brands.search");
    Route::get('/', "PanelController@index")->name("home.panel");
    Route::resource('/brands', 'BrandController');
    Route::resource('/planes', 'PlaneController');
});

Route::get('/', "Site\SiteController@index")->name("home-site");
Route::get('/promocoes', "Site\SiteController@promotions")->name('promotions');

Auth::routes();
