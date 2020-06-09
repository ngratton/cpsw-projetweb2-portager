<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fk_types_id',
        'description',
        'photo_path',
        'est_partage',
        'est_actif',
        'plants_visits',
        'fk_potagers_id',
        'fk_users_id',
    ];
}
