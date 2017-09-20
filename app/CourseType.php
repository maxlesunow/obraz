<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class CourseType extends Model
{
    use SoftDeletes;
    use SoftCascadeTrait;

    protected $softCascade = ['courses'];

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name'
    ];

    public function courses(){

        return $this->hasMany('App\Course');
    }
}
