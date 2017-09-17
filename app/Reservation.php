<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'cost', 'status', 'payment_status'
    ];

    public function course(){

        return $this->belongsTo('App\Course');
    }

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function payment_type(){

        return $this->belongsTo('App\PaymentType');
    }
}
