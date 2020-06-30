<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingProfile extends Model
{
    protected $fillable = [
        'user_id',
        'rating',
        'comment',
        'profile_id',
    ];

    protected $appends = [
        'user2',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    } 

    public function getUser2Attribute() {
        return $this->user->first_name;
    }
}

