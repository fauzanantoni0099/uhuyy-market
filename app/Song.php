<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $guarded = [];

    public function Album()
    {
        return $this->belongsTo(Album::class);
    }
    public function Artist()
    {
        return $this->belongsTo(Artist::class);
    }
    public function files()
    {
        return $this->morphMany(File::class,'fileable');
    }
}
