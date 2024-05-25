<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use App\Album;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'name_path' => 'Fumus.jpg',
        'imageable_id' => function () {
            return factory(Album::class)->create()->id;
        },
        'imageable_type' => 'App\Models\Album',
    ];
});
