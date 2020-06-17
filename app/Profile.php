<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'photo',
        'photo_mini',
        'bio',
        'jardine_depuis',
        'tags_jardiniers',
        'user_id',
        'profile_visites',
    ];
}
