<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'contenu',
        'from_id',
        'to_id',
        'created_at',
        'updated_at',
    ];

    protected $table = 'messages';
}
