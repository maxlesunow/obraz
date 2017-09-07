<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_url',
    ];

    public function full_name(){

        return join(' ', array($this->last_name, $this->first_name, $this->middle_name));
    }
}
