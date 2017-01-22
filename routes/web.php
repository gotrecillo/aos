<?php

Route::get('/', ['uses' => 'PageController@home']);

Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'namespace' => 'Admin'], function () {
    CRUD::resource('faction', 'FactionCrudController');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'namespace' => 'Admin'], function () {
    CRUD::resource('army', 'ArmyCrudController');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'namespace' => 'Admin'], function () {
    CRUD::resource('warscroll', 'WarscrollCrudController');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'namespace' => 'Admin'], function () {
    CRUD::resource('unity', 'UnityCrudController');
});

Route::get('{page}/{subs?}', ['uses' => 'PageController@index'])
    ->name('page')
    ->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);