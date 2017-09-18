<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'status', 'rating', 'text'
    ];

    public function user(){

        return $this->belongsTo('App\User');
    }
}
