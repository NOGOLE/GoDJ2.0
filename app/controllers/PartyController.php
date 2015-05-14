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
	$parties = DB::connection()->getPdo()->exec('SELECT
  id, (
    3959 * acos (
      cos ( radians(78.3232) )
      * cos( radians( lat ) )
      * cos( radians( lng ) - radians(65.3234) )
      + sin ( radians(78.3232) )
      * sin( radians( lat ) )
    )
  ) AS distance
FROM parties
HAVING distance < 30
ORDER BY distance
LIMIT 0 , 20');
var_dump($parties); exit();

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
