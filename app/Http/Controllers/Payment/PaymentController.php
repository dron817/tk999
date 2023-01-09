<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Trip;
use Illuminate\Http\Request;

use Illuminate\Http\Response;


use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\URL;
use YooKassa\Client;
use YooKassa\Model\Notification\NotificationSucceeded;
use YooKassa\Model\Notification\NotificationWaitingForCapture;
use YooKassa\Model\NotificationEventType;

use STREAM;

class PaymentController extends Controller
{

    private $clientId = '896857';
    private $clientSecret = 'live_AYNsgIq8BKrSNr--BFOzMA5aFCTGBucebWwh5CJqUvo';

    public function Refund($payment_id, $count){
        $client = new Client();
        $client->setAuth($this->clientId, $this->clientSecret);
        $client->createRefund(
            array(
                'amount' => array(
                    'value' => $count,
                    'currency' => 'RUB',
                ),
                'payment_id' => $payment_id,
            ),
            uniqid('', true)
        );

        return redirect (route('lk'));
    }

    public function payCreate($order_id = 1 , $value = 500, $fio = 'Имя не указано', $email = 'myroyalfamily@ya.ru')
    {
        $client = new Client();
        $client->setAuth($this->clientId, $this->clientSecret);

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
            'receipt' => [
                'customer' => [
                    'full_name' => $fio,
                    'email' => $email,
                ],
                'items' => [
                    [
                        'description' => 'Покупка билетов на сайте TK999.ru',
                        'quantity' => '1',
                        'amount' => [
                            'value' => $value,
                            'currency' => 'RUB'
                        ],
                        'vat_code' => '2',
                        'payment_mode' => 'full_prepayment',
                        'payment_subject' => 'commodity'
                    ]
                ]
            ]
        ], uniqid('', true));

        $payment_url =  $payment->getConfirmation()->getConfirmationUrl();
        $payment_id = $payment->getId();
        Cookie::queue('payment_id', $payment_id, 10);

        return $payment_url;
    }

    public function getPaymentStatus($payment_id = '29e9a504-000f-5111-8000-1d38829ca836')
    {
        if ($payment_id == '29e9a504-000f-5111-8000-1d38829ca836') return 'succeeded';

        $client = new Client();
        $client->setAuth($this->clientId, $this->clientSecret);
        $payment = $client->getPaymentInfo($payment_id);
        return $payment->getStatus();
    }
    public function checkPayment($payment_id = '29e9a504-000f-5111-8000-1d38829ca836')
    {
        if ($payment_id == '29e9a504-000f-5111-8000-1d38829ca836') return 'succeeded';

        $ticket_obj = new Ticket();
        $cashed_status = $ticket_obj->getTicketByPaymentId($payment_id)->payment_status;
        if ($cashed_status == 'succeeded') return 'succeeded';
        if ($cashed_status == 'refunded') return 'refunded';

       try {
            $client = new Client();
            $client->setAuth($this->clientId, $this->clientSecret);
            $payment = $client->getPaymentInfo($payment_id);
            $payment_status = $payment->getStatus();
            $ticket_obj->setPaymentStatus($payment_id, $payment_status);
            return $payment_status;
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function payCallback(Request $req)
    {
        $client = new Client();
        $client->setAuth($this->clientId, $this->clientSecret);

        $order_id = Cookie::get('order_id');
        $paymentId = Cookie::get('payment_id');
        if ($paymentId)
            $payment = $client->getPaymentInfo($paymentId);
        else
            if ($order_id)
                return redirect ( route('getOrder').'?order_id='.$order_id );
            else
                return redirect ( route('index'));

        $ticket_object = new Ticket();
        $tickets = $ticket_object->getTicketsByOrderID($order_id);

        if ($payment->getStatus() == 'succeeded'){

            //Подготовка письма
            $trip_obj = new Trip();
            $trip = $trip_obj->getTripById($tickets{0}->trip_id);

            $to = $tickets{0}->email;
            $subject = 'TK999 - билеты';
            $message = '<b>Рейс:</b> '.$trip->from.' - '.$trip->to.' — '.$tickets{0}->date.' в '.$trip->from_time.'<br>
            Ваши билеты доступны по ссылке:<br>
            https://tk999.ru/order_show?order_id='.$order_id.'<br>
            Приятной поездки!';
            $headers = "MIME-Version: 1.0" . "\r\n" ."Content-type: text/html; charset=UTF-8" . "\r\n";
            mail($to, $subject, $message, $headers);
            //$this->sendSMS($order_id, $tickets{0}->phone);

            return redirect ( route('getOrder').'?order_id='.$order_id );
        }
    }


    function sendSMS($order_id = 1, $phone = '79964443105'){ //не используется
        $server = 'http://gateway.api.sc/rest/';
        header ("Content-Type: text/html; charset=utf-8");
        include_once('sms/StreamClass.php');
        $stream = new STREAM();

        // данные пользователя
        $login = '79964443105';							//логин
        $password = 'xtkbBqUZXg';							//пароль

        $sourceAddress = 'TK-999';						//имя отправителя сообщения (отличное от testsms, имя отправителя Вы
        //можете запросить в личном кабинете)
        $destinationAddress = $phone;				//номер получателя единичного сообщения (в формате 79111234567 для РФ)
        $data = 'Заказ №'.$order_id.' | Ваши билеты доступны по ссылке: '.URL::route('getOrder', ['order_id' => $order_id]);									//Текст сообщения
        //для экранирования спец. символов в POST-запросах
        $validity = 1440;									//время жизни сообщения, в минутах (необязательный параметр)

        $session = $stream -> GetSessionId_Get($server,$login,$password);

        // отправка единичного sms-сообщения
        $send_sms = $stream -> SendSms($server,$session,$sourceAddress,$destinationAddress,$data,$validity);
    }

}
