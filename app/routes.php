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


Route::get('about', function()
{
	return View::make('about');
});

Route::get('contribute', function()
{
	return View::make('contribute');
});

Route::get('register', array('uses' =>'HomeController@showRegister'));
Route::get('profile', array('before'=>'auth','uses' => 'HomeController@showProfile'));
// route to show the login form
	Route::get('login', array('uses' => 'HomeController@showLogin'));

	// route to process the form
	Route::post('login', array('uses' => 'HomeController@doLogin'));

	//route to process logout
	Route::get('logout', array('uses' => 'HomeController@doLogout'));

//Route group for API versioning

Route::group(array('prefix'=>'api/v1'/*, 'before'=>'auth.api'*/), function()
{
	Route::resource('users', 'UserController');
	
	//end-point for song requests
	Route::resource('songs', 'SongController');
	Route::resource('moods', 'MoodController');
	Route::resource('visuals','GoogleVisualsController');
	Route::resource('parties','PartyController');
});
