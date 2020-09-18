<?php

Route::get('/home', "Panel\PanelController@index")->name('home');

Route::get('/', function () {
    return view('welcome');
});
