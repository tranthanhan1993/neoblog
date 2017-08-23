<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['slug', 'title', 'content', 'published'];

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
}
