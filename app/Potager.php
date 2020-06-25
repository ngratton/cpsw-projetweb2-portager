<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Potager extends Model
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
        'photos_path',
        'tags_potagers',
        'user_id',
        'est_actif',
        'visites_potagers',
        'note_moy',
    ];
}
