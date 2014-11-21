<?php

class MoodController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	echo 'Hello';
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
		//create new model
	$model = new Mood;
		//find associated DJ based on name
	$dj = User::where('username','=',Request::get('dj_id'))->get();
		//fill in attributes
	//var_dump($dj[0]->id);
	//exit();
	$model->dj_id=$dj[0]->id;
	$model->title = Request::get('title');
	$model->requestor_name = Request::get('requestor_name');
	$model->lat = Request::get('lat');
        $model->long = Request::get('long');
        if($model->save())
        {
/*      return Response::json(array(
        'error' => false,
        'song' => $model->toArray()),
        200
        );
*/
        $djname= $dj[0]->username;
        return Redirect::to('/')->with('success',"$model->requestor_name, your mood request of $model->title  has been sent to DJ $djname ");
        }
        else
        {
/*
        return Response::json(array(
        'error' => true,
        'message' => 'There was an error. Please try again.'),
        400
        );
*/
        return Redirect::to('/')->with('success', 'There was an error, please try again!');
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
	$model = Mood::findOrFail($id);
	return Response::json(array(
	'error' => false,
	'mood' => $model->toArray()),
	200
	);
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
	$model = Mood::findOrFail($id);
	if($dj=Request::get('dj_id'))
	{
	$model->dj_id = $dj; 
	}
	if($title = Request::get('title'))
	{
	$model->title = $title;
	}
	if($requestor = Request::get('requestor_name'))
	{
	$model->requestor_name = $requestor;
	}
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
	$model = Mood::findOrFail($id);
	if($model->delete())
	{
	return Response::json(array(
	'error' => false,
	'message' => 'Request successfully deleted'),
	200
	);
	}
	else
	{
	return Response::json(array(
	'error' => true,
	'message' => 'There was an error processing your request. Please try again.'),
	400
	);
	}
	}


}
