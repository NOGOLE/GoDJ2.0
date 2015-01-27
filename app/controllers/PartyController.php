<?php

class PartyController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	$key = Config::get('keys.geolocation_key');
	
	$url = 'https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key='
	.$key;
	//var_dump($url);exit();
	$ch=curl_init($url);
	echo curl_exec($ch);
	curl_close($ch);

	}



	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	$party = new Party;
	$party->dj_id = Auth::user()->id;
	$party->name = Request::get('name');
	$party->address = Request::get('address');
	$party->city = Request::get('city');
	$party->state = Request::get('state');
	$party->zip = Request::get('zip');
	$party->save();
	return Response::json($party->toArray());
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

	public function showForm()
	{
	return View::make('parties');
	}


}
