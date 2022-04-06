<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Http\Response;


use Illuminate\Support\Facades\Cookie;
use YooKassa\Client;
use YooKassa\Model\Notification\NotificationSucceeded;
use YooKassa\Model\Notification\NotificationWaitingForCapture;
use YooKassa\Model\NotificationEventType;

class PaymentController extends Controller
{
    public function payCreate($order_id = 1 , $value = 500)
    {
        $clientId = '898452';
        $clientSecret = 'test_COcHnkEfNYfpIkw7ggvbRLRe4qSh5Sfur16Y5oyDkEA';

        $client = new Client();
        $client->setAuth($clientId, $clientSecret);

        $payment = $client->createPayment([
            'amount' => [
                'value' => $value,
                'currency' => 'RUB',
            ],
            'description' => 'Заказ №'.$order_id, // Прописываем нужное описание
            'capture' => true,
            'confirmation' => [
                'type' => 'redirect',
                'return_url' => route('pay.callback'), // Задаём страницу на которую пользователь вернётся если нажмёт кнопку вернутся в магазин на сайте yooMoney
            ],
            'metadata' => [
                'order_id' => 1, // Передаём номер заказа например через $rec->amount
            ],
        ], uniqid('', true));

        $payment_url =  $payment->getConfirmation()->getConfirmationUrl();
        $payment_id = substr($payment_url, -36, 36);
        Cookie::queue('payment_id', $payment_id, 10);

        $answer = array(
            'redirect' => $payment_url
        );
        return ($answer);
    }


    public function payCallback(Request $req)
    {
        $clientId = '898452';
        $clientSecret = 'test_COcHnkEfNYfpIkw7ggvbRLRe4qSh5Sfur16Y5oyDkEA';

        $client = new Client();
        $client->setAuth($clientId, $clientSecret);

        $paymentId = Cookie::get('payment_id');
        $payment = $client->getPaymentInfo($paymentId);

        print_r($paymentId);
        print_r($payment->getStatus());

//        if ($payment->getStatus() == 'succeeded')
//            return redirect ( route('getOrder').'?order_id=1' );
    }
}
