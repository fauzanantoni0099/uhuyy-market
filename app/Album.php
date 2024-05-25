<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $guarded = [];

    public function Artist()
    {
        return $this->belongsTo(Artist::class);
    }
    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }
    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
