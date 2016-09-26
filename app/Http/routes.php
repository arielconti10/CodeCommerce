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

Route::get('/', 'StoreController@index');

Route::group(['prefix' => 'admin', 'where' => ['id' => '[0-9]+']], function(){
    Route::pattern('category', '[0-9]+');
    Route::pattern('product', '[0-9]+');

    //Categories Routes
    Route::group(['prefix' => 'categories'], function(){
        Route::get('/', ['as' => 'categories', 'uses' => 'AdminCategoriesController@index'] );
        Route::post('/', ['as' => 'categories.store', 'uses' =>'AdminCategoriesController@store'] );
        Route::get('create', ['as' => 'categories.create', 'uses' =>'AdminCategoriesController@create'] );
        Route::get('{category}/destroy', ['as' => 'categories.destroy', 'uses' => 'AdminCategoriesController@destroy']);
        Route::get('{category}/edit', ['as' => 'categories.edit', 'uses' => 'AdminCategoriesController@edit']);
        Route::put('{category}/update', ['as' => 'categories.update', 'uses' => 'AdminCategoriesController@update']);

    });
    //Products Routes
    Route::group(['prefix' => 'products'], function(){

        Route::get('/', ['as' => 'products', 'uses' => 'AdminProductsController@index']);
        Route::post('/', ['as' => 'products.store', 'uses' =>'AdminProductsController@store'] );
        Route::get('create', ['as' => 'products.create', 'uses' =>'AdminProductsController@create'] );
        Route::get('{product}/destroy', ['as' => 'products.destroy', 'uses' => 'AdminProductsController@destroy']);
        Route::get('{product}/edit', ['as' => 'products.edit', 'uses' => 'AdminProductsController@edit']);
        Route::put('{product}/update', ['as' => 'products.update', 'uses' => 'AdminProductsController@update']);


        Route::group(['prefix' => 'images'], function(){

            Route::get('{product}/product', ['as' => 'products.images', 'uses' => 'AdminProductsController@images']);
            Route::get('create/{product}/product', ['as' => 'products.images.create', 'uses' => 'AdminProductsController@createImage']);
            Route::post('store/{product}/product', ['as' => 'products.images.store', 'uses' => 'AdminProductsController@storeImage']);
            Route::get('destroy/{product}/product', ['as' => 'products.images.destroy', 'uses' => 'AdminProductsController@destroyImage']);

        });
    });

});


