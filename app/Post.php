<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    //
    protected $fillable = [
        'category_id',
        'photo_id',
        'title',
        'body'
    ];
//    public function photo () {
//        return $this->hasMany('App\Photo');
//    }
    public function user () {
        return $this->belongsTo('App\User');
    }

    public function photo () {
        return $this->belongsTo('App\Photo');
    }

    public function category () {
        return $this->belongsTo('App\Category');
    }

    public function comments () {
        return $this->hasMany('App\Comment');
    }
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source'    => 'title',
                'save_to'   => 'slug',
                'on_update' => 'true',
            ]
        ];
    }


}
