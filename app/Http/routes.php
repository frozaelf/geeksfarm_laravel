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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/articles_page', 'ArticlesController@page');
Route::get('/articles/testcode', 'PagesController@testcode');
Route::get('/articles/getExportPdf/{articles}', 'ArticlesController@getExportPdf');
Route::post('/articles/getImportExcel', 'ArticlesController@getImportExcel');
Route::get('/articles/getExportExcel/{articles}', 'ArticlesController@getExportExcel');
Route::post('/articles/post', 'ArticlesController@post');
Route::get('/articles/pagination', 'ArticlesController@pagination');
Route::get('/articles/searching', 'ArticlesController@searching');
Route::get('/articles/sorting', 'ArticlesController@sorting');
Route::resource('articles', 'ArticlesController');
Route::get('articles/delete/{articles}', ['as' => 'articles.delete', 'uses' => 'ArticlesController@destroy']);
Route::get('/profil', 'PagesController@profil');
Route::get('/contact', 'PagesController@contact');
Route::get('/about', 'PagesController@about');

Route::get('/', 'ArticlesController@index');
// 
// Route::get('/logout', 'SessionsController@logout');
// Route::post('/login', 'SessionsController@login');

Route::get('/welcome', function() {
	 return view('welcome'); 
});

Route::resource('comments', 'CommentsController'); 

Route::controller('datatables', 'ArticlesController', [
    'anyData'  => 'datatables.data',
    'getIndex' => 'datatables',
]);

Route::resource('users', 'UsersController', array('except' => array('index', 'destroy')));
Route::get('/signup', 'UsersController@create');
Route::resource('sessions', 'SessionsController');
Route::get('/signin', 'SessionsController@create');
Route::get('/signout', 'SessionsController@destroy');

Route::get('/reset-password', array('as' => 'reset-password', 'uses' => 'UsersController@reset_password'));
Route::post('/process-reset-password', array('as' => 'process-reset-password', 'uses' => 'UsersController@process_reset_password'));
Route::get('/change-password/{forgot_token}', array('as' => 'change-password', 'uses' => 'UsersController@change_password'));
Route::post('/process-change-password/{forgot_token}', array('as' => 'process-change-password', 'uses' => 'UsersController@process_change_password'));