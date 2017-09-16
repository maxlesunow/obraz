<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = [
        'name',
        'address',
        'cost',
        'time_register',
        'time_start',
        'description',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_url',
    ];

    public function course_type(){

        return $this->belongsTo('App\CourseType');
    }

    public function course_group(){

        return $this->belongsTo('App\CourseGroup');
    }

    public function speakers(){

        return $this->belongsToMany('App\Speaker');
    }



}
