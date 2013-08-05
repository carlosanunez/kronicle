<?php
class UserTableSeeder extends Seeder {

    public function run()
    {
        // !!! All existing users are deleted !!!
        DB::table('users')->delete();

        User::create(array(
            'id'        => 'wilfmeister',
            'fullname'  => 'Administrator',
            'password'  => Hash::make('wdforty3#'),
            'email'     => 'admin@localhost'
        ));
    }
}