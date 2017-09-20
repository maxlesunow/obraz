<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Speaker extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

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

    protected $appends = ['full_name'];

    public function getFullNameAttribute(){

        return join(' ', array($this->last_name, $this->first_name, $this->middle_name));
    }

    public function courses(){

        return $this->belongsToMany('App\Course');
    }
}
