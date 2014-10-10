<?php

class SongController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	$model = new Song;
	$model->title = Request::get('title');
	$model->artist = Request::get('artist');
	$model->requestor_name = Request::get('requestor_name');
	$dj = User::where('username','=',Request::get('dj_id'))->get();
	$model->dj_id = $dj[0]->id;
	if($model->save())
	{
	return Response::json(array(
	'error' => false,
	'song' => $model->toArray()),
	200
	);
	} 
	else
	{
	return Response::json(array(
	'error' => true,
	'message' => 'There was an error. Please try again.'),
	400
	);
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
	}


}
