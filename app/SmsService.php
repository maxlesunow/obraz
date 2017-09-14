<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use \App\Libs;

class SmsService extends Model
{
    //
    public function __construct()
    {
        $api_id ='c491b131-1dfa-e524-7955-012086d82bdb';
        $this->SmsProvider = new Libs\SMSRU($api_id);
    }

    public function getBalance()
    {
        $request = $this->SmsProvider->getBalance();
        if ($request->status == "OK") {
            return $request->balance;
        }
    }

    public function getLimit()
    {
        $request = $this->SmsProvider->getLimit();
        if ($request->status == "OK") {
            return $request->used_today .'/'.$request->total_limit;
        }
    }

    public function getSenders()
    {
        $request = $this->SmsProvider->getSenders();
        if ($request->status == "OK") {
            return $request->senders;
        }
    }

    public function sendMessage()
    {
        $data = new \stdClass();
        $data->to = '79205974694';
        $data->text = 'Hello World';
        // $data->from = ''; // Если у вас уже одобрен буквенный отправитель, его можно указать здесь, в противном случае будет использоваться ваш отправитель по умолчанию
//        $data->test = 1;
        // $data->partner_id = '1'; // Можно указать ваш ID партнера, если вы интегрируете код в чужую систему
        $sms =  $this->SmsProvider->send_one($data); // Отправка сообщения и возврат данных в переменную

        if ($sms->status == "OK") { // Запрос выполнен успешно
            return "Сообщение отправлено успешно. ";
        } else {
            return "Сообщение не отправлено. ";
        }

    }

}
