<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Album;
use App\Artist;
use Faker\Generator as Faker;

$factory->define(Album::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'release'=>$faker->date,
        'artist_id'=>function(){
        return factory(Artist::class)->create()->id;
        },
        'note'=>$faker->sentence

    ];
});
$factory->afterCreating(Album::class, function ($album) {
    // Menyertakan data gambar untuk album yang baru dibuat
    $album->images()->create([
        'name_path' => 'Fumus.jpg',
        'imageable_id' => function () {
            return factory(Album::class)->create()->id;
        },
        'imageable_type' => 'App\Models\Album',
    ]);
});

