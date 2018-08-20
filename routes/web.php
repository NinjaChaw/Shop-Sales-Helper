<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/visitor', function () {
    $categories = \App\Category::all();
    return view('visitor', compact('categories'));
});


Route::group(['middleware' => 'auth'], function () {

    //User CRUD
    Route::get('/users', [
        'uses' => 'UsersController@index',
        'as' => 'users'
    ]);

    Route::get('/user/make/saler/{id}', [
        'uses' => 'UsersController@make_saler',
        'as' => 'user.make.saler'
    ]);

    Route::get('/user/make/subscriber/{id}', [
        'uses' => 'UsersController@make_subscriber',
        'as' => 'user.make.subscriber'
    ]);

    //Admin Dashboard controller routs
    Route::get('/admin/dashboard', [
        'uses' => 'AdminDashboardController@index',
        'as' => 'admin.dashboard'
    ]);

    //Category CRUD
    Route::get('/category/create', [
        'uses' => 'CategoriesController@create',
        'as' => 'category.create'
    ]);

    Route::post('/category/store', [
        'uses' => 'CategoriesController@store',
        'as' => 'category.store'
    ]);

    Route::get('/category', [
        'uses' => 'CategoriesController@index',
        'as' => 'category'
    ]);

    Route::get('/category/edit/{id}', [
        'uses' => 'CategoriesController@edit',
        'as' => 'category.edit'
    ]);

    Route::post('/category/update/{id}', [
        'uses' => 'CategoriesController@update',
        'as' => 'category.update'
    ]);

    Route::get('/category/delete/{id}', [
        'uses' => 'CategoriesController@destroy',
        'as' => 'category.delete'
    ]);

//    Products CRUD
    Route::get('/products/create', [
        'uses' => 'ProductsController@create',
        'as' => 'products.create'
    ]);

    Route::post('/products/store', [
        'uses' => 'ProductsController@store',
        'as' => 'products.store'
    ]);

    Route::get('/products', [
        'uses' => 'ProductsController@index',
        'as' => 'products'
    ]);

    Route::get('/products/edit/{id}', [
        'uses' => 'ProductsController@edit',
        'as' => 'products.edit'
    ]);

    Route::post('/products/update/{id}', [
        'uses' => 'ProductsController@update',
        'as' => 'products.update'
    ]);

    Route::get('/products/delete/{id}', [
        'uses' => 'ProductsController@destroy',
        'as' => 'products.delete'
    ]);


    //Sale Controller
    Route::get('/sale/all', [
        'uses' => 'SalesController@index',
        'as' => 'sale.all'
    ]);

    Route::get('/sale/product/details/{id}', [
        'uses' => 'SalesController@product_details',
        'as' => 'sale.product.details'
    ]);

    Route::post('/search/products', [
        'uses' => 'SalesController@search',
        'as' => 'search.products'
    ]);

    Route::get('/product/sold/{id}', [
        'uses' => 'SalesController@product_sold',
        'as' => 'product.sold'
    ]);

});
