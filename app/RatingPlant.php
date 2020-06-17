<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingPlant extends Model
{
    protected $fillable = [
        'user_id',
        'rating',
        'comment',
        'plant_id',
    ];
}
