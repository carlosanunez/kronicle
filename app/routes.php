<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showHome');
Route::get('/contact', 'ContactController@showContact');

//Admin authentication
Route::get('/login', array('as' => 'login', 'uses' => 'AuthController@showLogin'));

Route::post('/login', 'AuthController@postLogin');

Route::get('/logout', 'AuthController@getLogout');

Route::post('/mail', 'MailController@sendMail');

Route::group(array('before' => 'auth'), function()
{
    Route::get('/create', 'PostsController@create');
    Route::get('/deleted', 'MiscController@showDeleted');
    Route::get('/success', 'MiscController@showUploaded');
    Route::get('/updated/{id}', 'MiscController@showUpdated');
    Route::get('/posts/{id}/dust', 'PostsController@destroy');
	Route::get('/posts/{id}/edit', 'PostsController@edit');
	Route::post('/submitted', 'PostsController@store');
	Route::post('/update/{id}', 'PostsController@update');
});

Route::get('/projects', 'ProjectsController@showProjects');

Route::get('/tags/json', 'TagsController@json');

Route::get('/tags/{tagID}', 'TagsController@show');

Route::get('/tags', 'TagsController@index');

Route::get('/search', 'SearchController@index');

Route::get('/posts/{id}', 'PostsController@show');

Route::get('/no-results', 'MiscController@showNoResults');

Route::get('/404', 'MiscController@show404');

Route::get('/error', 'MiscController@showError');

App::missing(function($exception)
{
	return Redirect::to('/404');
});
