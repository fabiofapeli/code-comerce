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


Route::group(['middleware' => ['web']], function () {
    Route::get('','storeController@index');
    Route::get('category/{id}',['as'=>'store.category','uses'=>'storeController@category']);

    Route::group(['prefix'=>'admin','where'=>['id'=>'[0-9]+']],function(){

        Route::group(['prefix'=>'categories'],function (){
            Route::get('',['as'=>'categories','uses'=>'CategoriesController@index']);
            Route::get('create',['as'=>'categories.create','uses'=>'CategoriesController@create']);
            Route::post('store',['as'=>'categories.store','uses'=>'CategoriesController@store']);
            Route::get('{id}/destroy',['as'=>'categories.destroy','uses'=>'CategoriesController@destroy']);
            Route::get('{id}/edit',['as'=>'categories.edit','uses'=>'CategoriesController@edit']);
            Route::put('update',['as'=>'categories.update','uses'=>'CategoriesController@update']);
        });

        Route::group(['prefix'=>'products'],function (){
        Route::get('',['as'=>'products','uses'=>'ProductsController@index']);
        Route::get('create',['as'=>'products.create','uses'=>'ProductsController@create']);
        Route::post('store',['as'=>'products.store','uses'=>'ProductsController@store']);
        Route::get('{id}/destroy',['as'=>'products.destroy','uses'=>'ProductsController@destroy']);
        Route::get('{id}/edit',['as'=>'products.edit','uses'=>'ProductsController@edit']);
        Route::put('update',['as'=>'products.update','uses'=>'ProductsController@update']);

            Route::group(['prefix'=>'{id}'],function (){
                Route::get('images',['as'=>'images','uses'=>'ProductsController@images']);
                Route::get('images/create',['as'=>'images.create','uses'=>'ProductsController@createImage']);
                Route::post('images/store',['as'=>'images.store','uses'=>'ProductsController@storeImage']);
                Route::get('images/destroy',['as'=>'images.destroy','uses'=>'ProductsController@destroyImage']);
            });

        });

    });

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


