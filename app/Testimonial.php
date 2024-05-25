<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $guarded = [];

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }
}
