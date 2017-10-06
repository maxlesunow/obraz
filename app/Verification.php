<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Illuminate\Support\MessageBag;

class Verification extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'code', 'wrong_pass', 'date_expire', 'date_send', 'type'
    ];

    public function __construct($type = 'registration'){

        $this->code = $this->generateCode();
        $this->wrong_pass = 0;
        $this->date_expire = Carbon::now()->addMinute(5);
        $this->type = $type;
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

    public function checkCode($code){
        //Добавляем попытку к верифицации
        $this->wrong_pass++;
        $this->save();


        if ($this->wrong_pass > 3){

            $errors = new MessageBag();

            // add your error messages:
            $errors->add('code', 'Слишком много попыток. Попробуйте позже');

            return response()->json($errors, 422);
        }
        elseif($this->code != $code) {

            $errors = new MessageBag();

            // add your error messages:
            $errors->add('code', 'СМС код не верный');

            return response()->json($errors, 422);
        }
        elseif ($this->date_expire < Carbon::now()){

            $errors = new MessageBag();

            // add your error messages:
            $errors->add('code', 'Срок действия кода истек');

            return response()->json($errors, 422);

        }
        else{
            $this->delete();

            return true;
        }
    }

    public function user(){

        return $this->belongsTo('App\User');
    }

}
