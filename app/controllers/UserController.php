<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	$users = User::all();
	return $users;
	}




public function apiStore() {
	//
	//get uploaded file and store
$file;
$model = new User;
$model->username = Input::get('username');
$model->email = Input::get('email');
$model->bio = Input::get('bio');
$model->password = Hash::make(Input::get('password'));
if($model->save())
{
	$login_details = [
		'email' 	=> Input::get('email'),
		'password' 	=> Input::get('password')
	];
	if(Auth::attempt($login_details))
	{
	return Redirect::to('/profile');
}
}
}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	$model = new User;
	$model->username = Input::get('username');
	$model->email = Input::get('email');
	$model->password = Hash::make(Input::get('password'));
	if($model->save())
	{
	return $model;
	}
	}



	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$user = User::find($id);
		$user->username = Input::get('username');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		return $user;
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	$user = User::find($id);
	$user->delete();
	return Response::json(['success'=>true]);
	}


}
