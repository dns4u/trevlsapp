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
Route::group(['prefix'=>'admin/','as'=>'admin.','namespace'=>'Admin\\','middleware'=>'auth'],function (){

    Route::get('profile',                            ['as' => 'profile',               'uses' => 'UserController@profile']);
    Route::post('profile',                           ['as' => 'profile.update',        'uses' => 'UserController@profileUpdate']);
    Route::get('user',                               ['as' => 'user',                  'uses' => 'UserController@index']);
    Route::get('user/show/{id}',                     ['as' => 'user.show',             'uses' => 'UserController@show']);
    Route::get('user/create',                        ['as' => 'user.create',           'uses' => 'UserController@create']);
    Route::post('user/store',                        ['as' => 'user.store',            'uses' => 'UserController@store']);
    Route::get('user/edit/{id}',                     ['as' => 'user.edit',             'uses' => 'UserController@edit']);
    Route::post('user/update/{id}',                  ['as' => 'user.update',           'uses' => 'UserController@update']);
    Route::get('user/delete/{id}',                   ['as' => 'user.delete',           'uses' => 'UserController@destroy']);

    Route::get('dashboard',                          ['as'=>'dashboard',               'uses'=>'DashboardController@index']);

    Route::get('product',                            ['as' => 'product',                     'uses' => 'ProductController@index']);
    Route::get('product/show/{id}',                  ['as' => 'product.show',                'uses' => 'ProductController@show']);
    Route::get('product/create',                     ['as' => 'product.create',              'uses' => 'ProductController@create']);
    Route::post('product/store',                     ['as' => 'product.store',               'uses' => 'ProductController@store']);
    Route::get('product/edit/{id}',                  ['as' => 'product.edit',                'uses' => 'ProductController@edit']);
    Route::post('product/update/{id}',               ['as' => 'product.update',              'uses' => 'ProductController@update']);
    Route::get('product/delete/{id}',                ['as' => 'product.delete',              'uses' => 'ProductController@destroy']);

    Route::get('order',                            ['as' => 'order',                          'uses' => 'OrderController@index']);
    Route::get('order/show/{id}',                  ['as' => 'order.show',                     'uses' => 'OrderController@show']);
    Route::get('order/delete/{id}',                ['as' => 'order.delete',                   'uses' => 'OrderController@destroy']);
});
Route::group(['as'=>'front.','namespace'=>'Front\\'],function (){
    Route::get('/',                                     ['as' => 'home',                           'uses' => 'HomeController@index']);
    Route::post('/product',                             ['as' => 'product.store',                  'uses' => 'HomeController@store']);
    Route::get('/product/select' ,                      ['as'=>'product.select',                   'uses'=>'HomeController@select']);
    Route::get('/product/review/{id}',                  ['as'=>'product.review',                    'uses'=>'HomeController@review']);
    Route::post('/product/review/{id}',                 ['as'=>'product.review.store',              'uses'=>'HomeController@storeReview']);
    Route::get('/product/userdetail/{id}',              ['as'=>'product.userdetail',               'uses'=>'HomeController@userDetail']);
    Route::post('/product/userdetail/{id}',             ['as'=>'product.userdetail.send',          'uses'=>'HomeController@userDetailSend']);
});
Route::get('/404', function () {
    return view('errors.404');
});

Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login');
Route::post('logout','Auth\LoginController@logout')->name('logout');

