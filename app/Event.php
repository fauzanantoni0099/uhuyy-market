<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
