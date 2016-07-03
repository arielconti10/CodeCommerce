<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::group(['prefix' => 'admin'], function(){
    Route::pattern('category', '[0-9]+');
    Route::pattern('product', '[0-9]+');

    //Categories Routes
    Route::group(['prefix' => 'categories', 'as'=>'category'], function(){
        Route::get('/', ['as' => '.index', 'uses' => 'AdminCategoriesController@index'] );
        Route::get('create', ['as' => '.create', 'uses' =>'AdminCategoriesController@create'] );
        Route::post('create', ['as' => '.store', 'uses' =>'AdminCategoriesController@store'] );

        Route::get('{category}/destroy', ['as' => '.destroy', 'uses' => 'AdminCategoriesController@destroy']);

        Route::get('{category}/edit', ['as' => '.edit', 'uses' => 'AdminCategoriesController@edit']);
        Route::put('{category}/update', ['as' => '.update', 'uses' => 'AdminCategoriesController@update']);

    });
    //Products Routes
    Route::group(['prefix' => 'products', 'as' => 'product'], function(){
        Route::get('/', ['as' => '.index', 'uses' => 'AdminProductsController@index']);
        Route::get('create', ['as' => '.create', 'uses' =>'AdminProductsController@create'] );
        Route::post('create', ['as' => '.store', 'uses' =>'AdminProductsController@store'] );

        Route::get('{product}/destroy', ['as' => '.destroy', 'uses' => 'AdminProductsController@destroy']);

        Route::get('{product}/edit', ['as' => '.edit', 'uses' => 'AdminProductsController@edit']);
        Route::put('{product}/update', ['as' => '.update', 'uses' => 'AdminProductsController@update']);
    });

});


