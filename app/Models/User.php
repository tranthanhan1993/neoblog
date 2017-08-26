<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'avatar',
        'role',
        'is_active',
        'token_verification',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    public function isAdmin()
    {
        return $this->role == config('settings.role.admin');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function getAvatarPath()
    {
        return asset('uploads/images/' . $this->avatar);
    }
}