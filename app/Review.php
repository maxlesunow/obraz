<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'status', 'rating', 'text'
    ];

    protected $with=['user'];

    public function user(){

        return $this->belongsTo('App\User');
    }
}
