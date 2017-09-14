<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SmsService;

class SmsServiceController extends Controller
{
    public function __construct()
    {
        $this->SmsService = new SmsService();
    }
    //
    public function getBalance(){
        return $this->SmsService->getBalance();
    }

    public function getLimit(){
        return $this->SmsService->getLimit();
    }

    public function getSenders(){
        return $this->SmsService->getSenders();
    }
}
