<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Song;
use App\Album;
use App\Artist;
use Faker\Generator as Faker;

$factory->define(Song::class, function (Faker $faker) {
    return [
        'album_id'=>function(){
        return factory(Album::class)->create()->id;
        },
        'artist_id'=>function(){
        return factory(Artist::class)->create()->id;
        },
        'title'=>'Anger!!!',
        'note'=>$faker->sentence
    ];
});
$factory->afterCreating(Song::class, function ($album){
    $album->files()->create([
        'name_path'=>'Anger!!!.mp3',
        'fileable_id'=> function(){
        return factory(Song::class)->create()->id;
        },
        'fileable_type'=>'App\Models\Album',
    ]);
});
