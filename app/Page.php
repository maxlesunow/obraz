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

    // =========    SEO PARAMS    =========

    public function getSeoTitleAttribute()
    {
        if($this->meta_title){

            return $this->meta_title;
        }
        else{

            return $this->title;
        }
    }

    public function getSeoDescriptionAttribute()
    {
        if($this->meta_description){

            return $this->meta_description;
        }
        else{

            return 'Страница '.$this->title;
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
            return 'Страница, '.join(', ', $result);
        }
    }
}
