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
        'position',
        'show_home',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_url',
    ];

    protected $appends = ['full_name', 'courses_count', 'url'];

    public function courses(){

        return $this->belongsToMany('App\Course');
    }

    public function getFullNameAttribute(){

        return join(' ', array($this->last_name, $this->first_name, $this->middle_name));
    }

    public function getCoursesCountAttribute(){

        return $this->courses()->count();
    }


    // =========    SEO PARAMS    =========

    public function getSlugAttribute()
    {
        if($this->meta_url){

            return str_slug($this->meta_url);
        }
        else{

            return str_slug($this->full_name);
        }
    }

    public function getUrlAttribute()
    {
        return action('Site\SpeakerController@show', [$this->id, $this->slug]);
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

            return 'Докладчик '.$this->full_name;
        }
    }

    public function getSeoKeywordsAttribute()
    {
        if($this->meta_description){

            return $this->meta_description;
        }
        else{

            return 'Докладчик, Спикер, '.join(', ', array($this->last_name, $this->first_name, $this->middle_name));
        }
    }


}
