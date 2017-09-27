<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YandexKassaController extends Controller
{
    public function success()
    {

        return view('site.payment.success');
    }

    public function error()
    {

        return view('site.payment.error');
    }

    public function aviso()
    {

        return 'aviso';
    }

    public function check(PaymentRequest $request, YandexPaymentRepositoryInterface $paymentRepo)
    {

        $md5 = $request->get('md5');
        $requestDatetime = $request->get('requestDatetime');

        $data = [
            'hash' => uniqid('yandex_payment_',true),
            'invoiceId' => $request->get('invoiceId'),
            'action' => $request->get('action'),
            'orderSumAmount' => $request->get('orderSumAmount'),
            'shopSumAmount' => $request->get('shopSumAmount'),
            'orderSumCurrencyPaycash' => $request->get('orderSumCurrencyPaycash'),
            'orderSumBankPaycash' => $request->get('orderSumBankPaycash'),
            'user_id' => $request->get('customerNumber'),
        ];

        //Проверяем хеш
        $code = $this->checkCode($data, $md5);

        if ($code === 0) {
            $transaction = BalanceTransaction::create([
                'value' => $data['orderSumAmount'],
                'hash' => uniqid('transaction_', true),
                'type' => BalanceTransaction::CONST_TYPE_REFILL,
                'user_id' => $data['user_id']
            ]);
            $data['transaction_id'] = $transaction->id;
            $payment = $paymentRepo->create($data);
        }

        $xml = $this->generateXml($code, $data['invoiceId'], $requestDatetime);
        return Response::make($xml->asXML())->header('content', 'application/xml');
    }

    /**
     * Generate XML
     * @param $code
     * @param $transactionId
     * @param $requestDatetime
     */
    protected function generateXml($code, $transactionId, $requestDatetime, $aviso = false)
    {
        $type = 'checkOrderResponse';
        if($aviso){
            $type = 'paymentAvisoResponse';
        }
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><'.$type.'/>');
        $xml->addAttribute('code', $code);
        $xml->addAttribute('invoiceId', $transactionId);
        $xml->addAttribute('shopId', config('yandex_kassa.shop.shopId'));
        $xml->addAttribute('performedDatetime', $requestDatetime);
        return $xml;
    }

    /**
     * Check md5 of the payment
     * @param array $data
     * @param $md5
     * @return int
     */
    private function checkCode(array $data, $md5)
    {
        $code = 1;
        $hash = md5($data['action']. ';'. $data['orderSumAmount']. ';'
            . $data['orderSumCurrencyPaycash'] . ';'. $data['orderSumBankPaycash'] . ';'
            . config('yandex_kassa.shop.shopId'). ';'. $data['invoiceId']
            . ';'. $data['user_id']. ';'. config('yandex_kassa.shop.password'));
        if (strtolower($hash) == strtolower($md5)) {
            $code = 0;
        }
        return $code;
    }
}
