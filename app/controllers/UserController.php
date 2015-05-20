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


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

public function apiStore() {
	//
$model = new User;
$model->username = Request::get('username');
$model->email = Request::get('email');
$model->password = Hash::make(Request::get('password'));
if($model->save())
{
	return Redirect::to('/');
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
	$model->username = Request::get('username');
	$model->email = Request::get('email');
	$model->password = Hash::make(Request::get('password'));
	if($model->save())
	{
	return $model;
	}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
