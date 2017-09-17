<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'number_document', 'total'
    ];

    public function reservation(){

        return $this->belongsTo('App\Reservation');
    }
}
