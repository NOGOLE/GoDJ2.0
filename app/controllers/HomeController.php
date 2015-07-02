<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

        public function doApiLogin() {
		$userdata = array(
      'email' => Input::get('email'),
      'password'      => Input::get('password'));

    if (Auth::attempt($userdata)) {
      $user = User::where('email', '=',$userdata['email'])->firstOrFail();
			return Response::json(array(
        'error'=>false,
				'username'=>$user->username,
				'id' => $user->id));
      } else {
        return Response::json(array(
          'error'=>true));

        }
  }
	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showLogin()
	{
		return View::make('login');
	}

	public function showRegister()
	{
		return View::make('registration');
	}
	public function showProfile()
	{
		$user = User::findOrFail(Auth::id());
		//var_dump($user->username); exit();
		return View::make('profile')->with('dj', $user);
	}

	public function doLogin()
	{ 
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			$userdata = array(
				'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password')
			);

			// attempt to do the login
			if (Auth::attempt($userdata)) {

				// validation successful!
				// redirect them to the secure section or whatever
				// return Redirect::to('secure');
				// for now we'll just echo success (even though echoing in a controller is bad)
				return Redirect::to('profile');

			} else {

				// validation not successful, send back to form
				return Redirect::to('login');

			}

		}
	}

public function doLogout()
{
	Auth::logout();
	return Redirect::to('/');
}

}
