<?php

class GoogleVisualsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//find all associated songrequests
		$songs = Song::where('dj_id','=', Auth::user()->id)->get();
		$moods = Mood::where('dj_id', '=', Auth::user()->id)->get();
		
		return Response::json(array(
		'songs'=>$songs->toArray(),
		'moods'=>$moods->toArray()
		),200
		);
	}




}
