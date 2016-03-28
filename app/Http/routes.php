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
	
	Route::get('test','CheckoutController@test');

    Route::get('login', ['as'=>'login','uses'=>'PostController@login']); // Redireciona para view de login
    Route::get('auth/register', 'PostController@register');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'PostController@logout');
    Route::post('auth/register', 'Auth\AuthController@postRegister');
    Route::get('password/email', 'PostController@password');
    Route::post('password/email', 'Auth\PasswordController@postEmail');

    Route::get('',['as'=>'store.index','uses'=>'storeController@index']);
    Route::get('category/{id}',['as'=>'store.category','uses'=>'storeController@category']);
    Route::get('product/{id}',['as'=>'store.product','uses'=>'storeController@product']);
    Route::get('tag/{id}',['as'=>'store.tag','uses'=>'storeController@tag']);
    Route::get('cart',['as'=>'cart','uses'=>'CartController@index']);
    Route::post('cart',['as'=>'cart.add','uses'=>'CartController@add']);
    Route::get('cart/destroy/{id}',['as'=>'cart.destroy','uses'=>'CartController@destroy']);


    Route::group(['middleware'=>'auth'],function (){
        Route::get('checkout/placeOrder',['as'=>'checkout.place','uses'=>'CheckoutController@place']);
        Route::get('account/orders',['as'=>'account.orders','uses'=>'AccountController@orders']);
    });

    Route::group(['prefix'=>'admin','middleware'=>['auth.admin','auth'],'where'=>['id'=>'[0-9]+']],function(){
    			
		Route::group(['prefix'=>'orders'],function (){
            Route::get('',['as'=>'orders','uses'=>'OrdersController@index']);
			Route::get('{id}/edit',['as'=>'orders.edit','uses'=>'OrdersController@edit']);
			Route::put('update',['as'=>'orders.update','uses'=>'OrdersController@update']);
        });

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


