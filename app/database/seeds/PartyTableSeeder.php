<?php

class PartyTableSeeder extends Seeder {

    public function run()
    {
        DB::table('parties')->delete();
        /*
        $party->dj_id = Auth::user()->id;
      	$party->name = Request::get('name');
      	$party->address = Request::get('address');
      	$party->city = Request::get('city');
      	$party->state = Request::get('state');
      	$party->zip = Request::get('zip');

        */


        Party::create(array(
	          'dj_id' => '4',
            'name' => 'GoDJ Launch Party',
            'address' => '21967 Princeton St.',
            'city' => 'Hayward',
            'state' => 'CA',
            'zip' => '94541',
	   'lat' => '134.525',
	   'lng' => '12.124'
        ));

        Party::create(array(
	          'dj_id' => '4',
            'name' => '2015 Summer Bash',
            'address' => '98A Gentry Dr.',
            'city' => 'Stanford',
            'state' => 'KY',
            'zip' => '40484'
        ));

        Party::create(array(
	          'dj_id' => '4',
            'name' => 'Rebekah Birthday Celebration',
            'address' => '21967 Princeton St.',
            'city' => 'Hayward',
            'state' => 'CA',
            'zip' => '94541'

        ));

    }

}
