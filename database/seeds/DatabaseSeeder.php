<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(Artist::class, 20)->create();
        factory(Album::class, 20)->create();
        factory(Testimonial::class, 20)->create();
        factory(Song::class, 20)->create();
    }
}
