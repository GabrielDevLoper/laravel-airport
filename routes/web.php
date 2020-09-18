<?php

Route::get('/', "Site\SiteController@index")->name("home");
Route::get('/home', "Panel\PanelController@index");

Route::get('/promocoes', "Site\SiteController@promotions")->name('promotions');
