<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Testimonial;
use Faker\Generator as Faker;

$factory->define(Testimonial::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'job'=>$faker->jobTitle,
        'note'=>$faker->word
    ];
});
$factory->afterCreating(Testimonial::class, function ($testimonial) {
    // Menyertakan data gambar untuk album yang baru dibuat
    $testimonial->images()->create([
        'name_path' => 'Fumus.jpg',
        'imageable_id' => function () {
            return factory(Testimonial::class)->create()->id;
        },
        'imageable_type' => 'App\Models\Testimonial',
    ]);
});
