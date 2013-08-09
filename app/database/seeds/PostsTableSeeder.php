<?php
class PostsTableSeeder extends Seeder {

    public function run()
    {
        // !!! All existing users are deleted !!!
        DB::table('posts')->delete();

        Posts::create(array(
            'title'   => 'Daft Punk',
            'photo'   => 'bin/photos/daftpunk.jpg',
            'content' => 'Daft Punk is super cool. Their new music sucks though, but Discovery was/is awesome.'
        ));
    }
}