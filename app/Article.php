<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    
    protected $fillable = [

        'title',
        'body',
        'published_at'

    ];

    protected $dates = ['published_at'];

    //QUERY SCOPE, works like a shortcut basically
    public function scopePublished($query)
    {

        $query->where('published_at','<=', Carbon::now());

    }

    public function scopeUnpublished($query)
    {

        $query->where('published_at','>=', Carbon::now());

    }

    //SEtters
    public function setPublishedAtAttribute($date)
    {

        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d',$date);



    }
}