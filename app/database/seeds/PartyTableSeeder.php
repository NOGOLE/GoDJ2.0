<?php

class PartyTableSeeder extends Seeder {

    public function run()
    {
        DB::table('parties')->delete();

        Party::create(array(
	    'dj_id' => '1',
            'name' => 'GoDJ Launch Party',
            'address' => '21967 Princeton St.',
            'city' => 'Hayward',
            'state' => 'CA',
            'zip' => '94541',
	   'lat' => '134.525',
	   'lng' => '12.124'
        ));


        Party::create(array(
	          'dj_id' => '1',
            'name' => 'Rebekah Birthday Celebration',
            'address' => '21967 Princeton St.',
            'city' => 'Hayward',
            'state' => 'CA',
            'zip' => '94541'

        ));

    }

}
