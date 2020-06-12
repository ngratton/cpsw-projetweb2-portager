<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileRating extends Model
{
    protected $fillable = [
        'rating',
        'comment',
        'profile_id'
    ];
}
