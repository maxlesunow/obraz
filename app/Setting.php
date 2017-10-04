<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $fillable = [
        'phone',
        'address',
        'email',
        'vk_url',
        'fb_url',
        'ok_url',
        'instagram_url',
        'twitter_url',
    ];
}
