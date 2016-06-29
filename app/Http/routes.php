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

    Route::get('categories', 'AdminCategoriesController@index');
    Route::get('categories/{category}', function(\CodeCommerce\Category $category){
        return view('admin_category_single', compact('category'));
    });

    Route::get('products', 'AdminProductsController@index');
    Route::get('products/{product}', function(\CodeCommerce\Products $product){
        return view('admin_product_single', compact('product'));
    });

});


