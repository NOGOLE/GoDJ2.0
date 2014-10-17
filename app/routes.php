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

Route::get('/', function()
{
	return View::make('hello');
});


Route::get('/about', function()
{
	return View::make('about');
});


Route::get('/login', function()
{
	return View::make('login');

});


//Route group for API versioning

Route::group(array('prefix'=>'api/v1'/*, 'before'=>'auth.basic'*/), function()
{
	Route::resource('users', 'UserController');
	
	//end-point for song requests
	Route::resource('songs', 'SongController');
	Route::resource('moods', 'MoodController');
});
