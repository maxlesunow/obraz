<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Verification extends Model
{
    public function __construct()
    {
        $this->code = $this->generateCode();
        $this->wrong_pass = 0;
        $this->date_expire = Carbon::now()->addMinute(5);
    }

    protected $fillable = [
        'code', 'wrong_pass', 'date_expire'
    ];

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

}
