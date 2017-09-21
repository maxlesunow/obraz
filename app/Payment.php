<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $with = ['reservation'];

    protected $fillable = [
        'number_document', 'total'
    ];

    public function reservation(){

        return $this->belongsTo('App\Reservation');
    }
}
