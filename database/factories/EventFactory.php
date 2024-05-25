<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'location'=>$faker->address,
        'date'=>$faker->date,
        'note'=>$faker->word
    ];
});
$factory->afterCreating(Event::class, function ($event) {
    // Menyertakan data gambar untuk album yang baru dibuat
    $event->images()->create([
        'name_path' => 'Fumus.jpg',
        'imageable_id' => function () {
            return factory(Event::class)->create()->id;
        },
        'imageable_type' => 'App\Models\Event',
    ]);
});
