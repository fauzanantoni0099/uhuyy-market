<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $guarded = [];

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function albums()
    {
        return $this->hasMany(Album::class);
    }
    public function artists()
    {
        return $this->hasMany(Artist::class);
    }
}
