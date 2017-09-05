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
        'password', 'remember_token',
    ];

    public function role(){
        
        return $this->belongsTo('App\Role');
    }
    
    public function verification(){
        
        return $this->belongsTo('App\Verification');
    }

    public function hasRole()
    {
      return $this->role;
    }

    public function is_verificate(){
        return $this->role()->success;
    }

}
