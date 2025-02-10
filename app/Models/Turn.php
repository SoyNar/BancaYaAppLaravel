<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    protected $fillable = [

        'client_id',
        'avoid_id',
        'ticket',

        ];
}
