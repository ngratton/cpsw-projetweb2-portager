<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingPotager extends Model
{
    protected $fillable = [
        'user_id',
        'rating',
        'comment',
        'potager_id',
    ];
}
