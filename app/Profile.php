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
        'profil_photo_path',
        'bio',
        'jardine_depuis',
        'tags_jardiniers',
        'fk_users_id',
        'profile_visites',
    ];
}
