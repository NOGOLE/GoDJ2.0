<?php

class PartyController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//get all parties within 25 miles
$parties = Party::all();
return $parties;

	}



	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	$party = new Party;
	$party->dj_id = Input::get('id');
	$party->name = Input::get('name');
	$party->address = Input::get('address');
	$party->city = Input::get('city');
	$party->state = Input::get('state');
	$party->zip = Input::get('zip');
	$party->start_time = Input::get('start_time');
	$party->end_time = Input::get('end_time');
	$party->save();
	return $party;
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
