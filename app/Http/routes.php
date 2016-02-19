<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix'=>'admin'],function(){


    Route::group(['prefix'=>'products'],function() {
        Route::get('',['as'=>'admin.product','uses'=> 'AdminProductsController@index']);
        Route::get('create', ['as'=>'admin.product.create','uses'=>'AdminProductsController@create']);
        Route::get('edit/{id}',['as'=>'admin.product.edit','uses'=>'AdminProductsController@edit']);
        Route::get('destroy/{id}',['as'=>'admin.product.destroy','uses'=>'AdminProductsController@destroy']);
    });

    Route::group(['prefix'=>'categories'],function() {
        Route::get('',['as'=>'admin.category','uses'=> 'AdminCategoriesController@index']);
        Route::get('create',['as'=>'admin.category.create','uses'=> 'AdminCategoriesController@create']);
        Route::get('edit/{id}',['as'=>'admin.category.edit','uses'=>'AdminCategoriesController@edit']);
        Route::get('destroy/{id}',['as'=>'admin.category.destroy','uses'=>'AdminCategoriesController@destroy']);
    });
});

Route::get('/', function () {
    return view('welcome');
});




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
