<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    protected $fillable = [
        'code', 'wrong_pass', 'date_expire',
    ];
}
