<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Course extends Model
{
    use SoftDeletes;
    use SoftCascadeTrait;

    protected $softCascade = ['reservations'];

    protected $dates = ['deleted_at'];
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

    protected $appends = ['reservations_count'];

    protected $with = ['course_type', 'course_group', 'speakers'];

    public function course_type(){

        return $this->belongsTo('App\CourseType');
    }

    public function course_group(){

        return $this->belongsTo('App\CourseGroup');
    }

    public function speakers(){

        return $this->belongsToMany('App\Speaker');
    }

    public function reservations(){

        return $this->hasMany('App\Reservation');
    }


    public function getReservationsCountAttribute(){

        return $this->reservations()->where('status', true)->count();
    }

    public function getSlugAttribute()
    {
        if($this->meta_url){

            return str_slug($this->meta_url);
        }
        else{

            return str_slug($this->name);
        }
    }

    public function getUrlAttribute()
    {
        return action('Site\CourseController@show', [$this->id, $this->slug]);
    }
}
