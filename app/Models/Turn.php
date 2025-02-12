<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{

    protected $table = 'turn';
    protected $fillable = [

        'ticket',
        'category',
        'date_attention',
        'client_id',
        'advisor_id'
        ,'status',

        ];
    public function client(){
        return $this->belongsTo(User::class,'client_id');
    }

    /**
     *

     */

    public function advisor(){
        return $this->belongsTo(User::class,'advisor_id');
    }
}
