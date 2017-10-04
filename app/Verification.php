<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Verification extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'code', 'wrong_pass', 'date_expire'
    ];

    public function __construct()
    {
        $this->code = $this->generateCode();
        $this->wrong_pass = 0;
        $this->date_expire = Carbon::now()->addMinute(5);
    }

    protected function generateCode(){
        $code ='';
        for ($i = 0; $i < 4; $i++) {
            $code .= rand(0, 9);
        }
        return $code;
    }


    public function reGenerateCode(){
        $this->code = $this->generateCode();
        $this->wrong_pass = 0;
        $this->date_expire = Carbon::now()->addMinute(5);
    }
    
    public function reGenerateCodeTest(){
        $this->code = ''.9999;
        $this->wrong_pass = 0;
        $this->date_expire = Carbon::now()->addMinute(5);
    }

}
