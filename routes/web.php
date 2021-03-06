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

Route::get('/', 'BlogController@index')->name('blog');

Route::get('/blog/{post}','BlogController@show')->name('blog.show');

Route::get('/category/{category}','BlogController@category')->name('category');

Route::get('/author/{author}','BlogController@author')->name('author');
Auth::routes();

Route::get('/home', 'Backend\HomeController@index')->name('home');
Route::get('/edit-account', 'Backend\HomeController@edit');
Route::put('/update-account', 'Backend\HomeController@update');

Route::resource('/backend/blog','Backend\BlogController',[
       'as'=>'backend' 
]);

Route::put('backend/blog/restore/{blog}',[
       'uses'=>'Backend\BlogController@restore',
       'as'=>'backend.blog.restore'
]);

Route::delete('backend/blog/force-destory/{blog}',[
       'uses'=>'Backend\BlogController@forceDestroy',
       'as'=>'backend.blog.force-destroy'
]);

Route::resource('/backend/categories','Backend\CategoriesController',[
       'as'=>'backend'
]);

Route::resource('/backend/users','Backend\UserController',[
       'as'=>'backend'
]);

Route::get('/backend/users/confirm/{users}',[
       'uses'=>'Backend\UserController@confirm',
        'as'=>'backend.users.confirm'
]);
