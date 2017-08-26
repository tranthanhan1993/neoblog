<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'published', 'user_id', 'tag_id', 'image', 'summary'];

    protected $table = 'posts';

    public function setTitleAttribute($value)
    {
      $this->attributes['title'] = $value;
      if (! $this->exists) {
        $this->attributes['slug'] =  str_slug($value);
      }
    }

    public function tag()
    {
        return $this->belongsTo('App\Models\Tag');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function comments()
    {
      return $this->hasMany('App\Models\Comment');
    }

    public function getImagePath()
    {
        return asset('image/' . $this->image);
    }
}
