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
        'type_id',
        'description',
        'photo_path',
        'est_partage',
        'est_actif',
        'plants_visits',
        'potager_id',
        'user_id',
    ];


    public function user() {
        return $this->belongsTo('App\User');
    }

    public function type() {
        return $this->belongsTo('App\Type');
    }
}
