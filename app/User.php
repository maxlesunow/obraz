<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'middle_name', 'phone', 'email', 'password', 'is_verification',
    ];

    protected $appends = ['full_name', 'reviews_count', 'reservations_count'];
    protected $with = ['role'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
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
