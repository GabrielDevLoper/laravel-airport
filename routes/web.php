<?php

Route::get('/', "Site\SiteController@index")->name("home-site");
Route::get('/panel', "Panel\PanelController@index");

Route::get('/promocoes', "Site\SiteController@promotions")->name('promotions');

Auth::routes();
