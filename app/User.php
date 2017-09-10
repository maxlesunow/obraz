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
        'first_name', 'last_name', 'middle_name', 'phone', 'email', 'role_id', 'password', 'is_verification',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'is_verification', 'role', 'verification', 'verification_id'
    ];

    public function full_name(){

        return join(' ', array($this->last_name, $this->first_name, $this->middle_name));
    }

    public function is_verificate(){

        return $this->role()->success;
    }

    public function role(){

        return $this->belongsTo('App\Role');
    }

    public function verification(){

        return $this->belongsTo('App\Verification');
    }
}
