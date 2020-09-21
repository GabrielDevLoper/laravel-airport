<?php

Route::group(['prefix' => 'panel', 'namespace' => 'Panel'], function () {
    Route::resource('/brands', 'BrandController');
    Route::get('/', "PanelController@index")->name("home.panel");
    Route::post('/brands/buscar', 'BrandController@search')->name("brands-search");
});

Route::get('/', "Site\SiteController@index")->name("home-site");
Route::get('/promocoes', "Site\SiteController@promotions")->name('promotions');

Auth::routes();
