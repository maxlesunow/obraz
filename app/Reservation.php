<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Reservation extends Model
{
    use SoftDeletes;
    use SoftCascadeTrait;

    protected $softCascade = ['payments'];

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'cost', 'status', 'payment_status', 'comment', 'is_verification'
    ];

    protected $appends = ['name'];

    protected $with = ['course', 'user', 'payment_type'];

    protected $hidden = [
       'verification', 'verification_id',
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

    public function payments(){

        return $this->hasMany('App\Payment');
    }

    public function verification(){

        return $this->belongsTo('App\Verification');
    }

    public function getNameAttribute(){

        return '№'. $this->id . ' - ' . $this->cost .' руб';
    }
}
