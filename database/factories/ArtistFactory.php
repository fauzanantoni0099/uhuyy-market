<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Artist;
use Faker\Generator as Faker;

$factory->define(Artist::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'genre'=>$faker->word,
        'address'=>$faker->address,
        'note'=>$faker->sentence
    ];
});
$factory->afterCreating(Artist::class, function ($artist) {
    // Menyertakan data gambar untuk album yang baru dibuat
    $artist->images()->create([
        'name_path' => 'Fumus.jpg',
        'imageable_id' => function () {
            return factory(Artist::class)->create()->id;
        },
        'imageable_type' => 'App\Models\Artist',
    ]);
});
