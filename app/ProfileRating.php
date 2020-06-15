<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileRating extends Model
{
    protected $fillable = [
        'user_id',
        'rating',
        'comment',
        'profile_id',
    ];
}
