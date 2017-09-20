<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use SoftCascadeTrait;

    protected $softCascade = ['verification', 'reservations', 'reviews'];

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'first_name', 'last_name', 'middle_name', 'phone', 'email', 'password', 'is_verification',
    ];

    protected $appends = ['full_name', 'reviews_count', 'reservations_count'];

    protected $with = ['role'];

    protected $hidden = [
        'password', 'remember_token', 'verification', 'verification_id', 'role_id'
    ];

    public function role(){

        return $this->belongsTo('App\Role');
    }

    public function verification(){

        return $this->belongsTo('App\Verification');
    }

    public function reservations(){

        return $this->hasMany('App\Reservation');
    }

    public function reviews(){

        return $this->hasMany('App\Review');
    }

    public function getFullNameAttribute(){

        return join(' ', array($this->last_name, $this->first_name, $this->middle_name));
    }

    public function getReservationsCountAttribute(){

        return $this->reservations()->count();
    }

    public function getReviewsCountAttribute(){

        return $this->reviews()->count();
    }

}
