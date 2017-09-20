<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Reservation extends Model
{
    use SoftDeletes;
    use SoftCascadeTrait;

    protected $softCascade = ['user'];

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'cost', 'status', 'payment_status'
    ];

    protected $appends = ['name'];

    protected $with = ['course', 'user', 'payment_type'];

    public function course(){

        return $this->belongsTo('App\Course');
    }

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function payment_type(){

        return $this->belongsTo('App\PaymentType');
    }

    public function getNameAttribute(){

        return '№'. $this->id . ' - ' . $this->cost .' руб';
    }
}
