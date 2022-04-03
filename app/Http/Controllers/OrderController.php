<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\URL;
use STREAM;

class OrderController extends Controller
{
    function print(Request $request): Response
    {
        $ticket_id = $_GET['ticket_id'];
        $ticket = new Ticket();
        $trip = new Trip();
        $data = $ticket->getTicketByID($ticket_id);
        $trip_info = $trip->getTripById($data->trip_id);

        $pdf = PDF::loadView('pdf.ticket', compact('data', 'trip_info'));
        return $pdf->stream($data->id.'_ticket_'.$data->date.'_'.$data->fio.'.pdf');
    }

    function getOrder(Request $request){
        $order_id = $_GET['order_id'];
        $ticket = new Ticket();
        $tickets = $ticket->getTicketsByOrderID($order_id);
        $trip = new Trip();
        $trip_info = $trip->getTripById($tickets{0}->trip_id);

        $i=0;
        foreach ($tickets as $ticket){
            $tickets_arr[] = json_decode(json_encode($ticket), true);
            $i++;
        }
        return view('pages/order', ['tickets' => $tickets, 'trip' => $trip_info]);
    }

    function letOrder(Request $request): array
    {
        $ticket = new Ticket();
        $order_id = $ticket->getMaxOrder()+1;

        $count = $_POST['data']['count'];
        for($i=1; $i<=$count; $i++){
            $ticket = new Ticket();
            $ticket->fio = $_POST['data'][$i]['fio'];
            $ticket->place = $_POST['data'][$i]['place'];
            $ticket->doc = $_POST['data'][$i]['doc'];
            $ticket->phone = '0';
            $ticket->phone = $_POST['data'][$i]['phone'];
            $ticket->tariff = $_POST['data'][$i]['tariff'];
            $ticket->address = '-';
            $ticket->address = $_POST['data'][$i]['address'];
            $ticket->date = $_POST['data']['date'];
            $ticket->trip_id = $_POST['data']['trip_id'];
            $ticket->order_id = $order_id;
            $ticket->author = $_POST['data']['author'];
            $ticket->save();
            $tickets_id[$i]=$ticket->getQueueableId();
        }

        if ($_POST['data']['sendSMS'] == 1)
            $this->sendSMS($order_id, $_POST['data'][1]['phone']);

        $answer = array(
            'redirect' => $order_id
        );
        return ($answer);
    }

    function sendSMS($order_id = 1, $phone = '79964443105'){
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
