<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    protected $fillable = [
        'name', 'type_code', 'is_online'
    ];

    public function reservation(){

        return $this->belongsTo('App\Reservation');
    }

}
