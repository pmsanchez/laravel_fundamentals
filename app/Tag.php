<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    /**
     * Get the articles associated wiht the given tag.
     */
    public function articles()
    {
        return $this->belongsToMany('App\Article')->withTimestamps();
    }
}
