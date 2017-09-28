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


    // =========    SEO PARAMS    =========

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

    public function getSeoTitleAttribute()
    {
        if($this->meta_title){

            return $this->meta_title;
        }
        else{

            return $this->full_name;
        }
    }

    public function getSeoDescriptionAttribute()
    {
        if($this->meta_description){

            return $this->meta_description;
        }
        else{

            return 'Курс '.$this->name;
        }
    }

    public function getSeoKeywordsAttribute()
    {
        if($this->meta_keywords){

            return $this->meta_keywords;
        }
        else{

            //Разбиваем name (только буквы-цифры)
            $keywords = explode(' ', preg_replace ("/[^a-zA-ZА-Яа-я0-9\s]/",'',$this->name));

            $result = array();

            //Берем только слова больше 2х символов, первая буква заглавная
            foreach ($keywords as $keyword){
                if (mb_strlen ($keyword) > 2){
                    $result[] =  mb_convert_case($keyword, MB_CASE_TITLE, "UTF-8");
                }
            }
            return 'Курс, Обучение, '.join(', ', $result);
        }
    }

}
