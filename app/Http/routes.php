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
    Route::get('products','AdminProductsController@index');
    Route::get('categories',['as'=>'gerenciar-produtos','uses'=>'AdminCategoriesController@index']);
});

Route::get('category/{category}',function(\App\Category $category){
    echo $category->name;
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
