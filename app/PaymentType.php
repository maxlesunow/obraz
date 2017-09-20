<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class PaymentType extends Model
{
    use SoftDeletes;
    use SoftCascadeTrait;

    protected $softCascade = ['courses'];

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'type_code', 'is_online'
    ];

    public function reservations(){

        return $this->hasMany('App\Reservation');
    }
}
