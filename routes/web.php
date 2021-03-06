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

Route::get('about','PagesController@about');

Route::get('contact','PagesController@contact');


// Route::get('articles','ArticlesController@index');

// Route::get('articles/create','ArticlesController@create');

// Route::get('articles/{id}','ArticlesController@show');

// Route::post('articles','ArticlesController@store');

#By Adding a Route resource, it will automatically make all the routes for the designated controller
#to test...go to php artisan route:list
Route::resource('articles','ArticlesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

