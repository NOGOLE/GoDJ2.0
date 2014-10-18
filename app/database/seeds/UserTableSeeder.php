<?php
 
class UserTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('users')->delete();
 
        User::create(array(
	    'email' => 'jyrone.parker@gmail.com',
            'username' => 'mastashake08',
            'password' => Hash::make('n1nt3nd0')
        ));
 
    }
 
}
