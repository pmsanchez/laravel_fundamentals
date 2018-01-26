<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    
    protected $fillable = [

        'title',
        'body',
        'published_at',
        'user_id'

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

    /**
     * An article is owned by a USER
     */
    public function user()
    {

        return $this->belongsTo('App\User');
    }


    /**
     * Get the tags associated with the given article
     * 
     * 
     */
    public function tags()
    {

        return $this->belongsToMany('App\Tag')->withTimestamps();



    }



}
