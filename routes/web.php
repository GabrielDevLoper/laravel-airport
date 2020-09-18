<?php

Route::group(['prefix' => 'panel', 'namespace' => 'Panel'], function () {
    Route::resource('/brands', 'BrandController');
    Route::get('/', "PanelController@index");
});

Route::get('/', "Site\SiteController@index");
Route::get('/promocoes', "Site\SiteController@promotions")->name('promotions');

Auth::routes();
