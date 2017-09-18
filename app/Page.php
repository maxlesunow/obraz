<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'type',
        'title',
        'text',
        'options',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_url',
    ];
}
