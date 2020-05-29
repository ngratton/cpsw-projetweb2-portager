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
        'address_1',
        'address_2',
        'city',
        'prov',
        'country',
        'postal_code',
        'bio',
        'profil_photo_path',
    ];
}
