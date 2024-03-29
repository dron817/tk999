<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Ticket;
use App\Http\Controllers\Payment\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Cookie;
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
        if ($trip_info->change_date==1){
            $unix = strtotime($data->date) + 86400;
            $data->finish_date=date('d.m.Y', $unix);
        }
        else $data->finish_date=$data->date;

        $pdf = PDF::loadView('pdf.ticket', compact('data', 'trip_info'));
        $pdf->setPaper('A5', 'landscape');
        return $pdf->stream($data->id.'_ticket_'.$data->date.'_'.$data->fio.'.pdf');
    }

    function getOrder(Request $request){
        $order_id = $_GET['order_id'];

        $ticket_obj = new Ticket();
        $tickets = $ticket_obj->getTicketsByOrderID($order_id);

        $trip = new Trip();
        $trip_info = $trip->getTripById($tickets{0}->trip_id);

        $i=0;


        $PaymentController_obj = new PaymentController();

        foreach ($tickets as $ticket){
            $tickets_arr[] = json_decode(json_encode($ticket), true);
            $i++;
            $payment_id = $ticket->payment_id;
            $author = $ticket->author;
            if ($author == 'web'){
                $payed = $PaymentController_obj->checkPayment($payment_id);
//                 if ($payed=='succeeded'){
//                     $ticket_obj->setPayedOnTicket($ticket->id);
//                 }
            }
            else
                $payed = 'succeeded';
        }
        $payment_url = 'https://yoomoney.ru/checkout/payments/v2/contract?orderId='.$payment_id;

        return view('pages/order', ['tickets' => $tickets, 'trip' => $trip_info, 'payed' => $payed, 'payment_url' => $payment_url]);
    }

    function RefundPage(Request $request){
        date_default_timezone_set('Asia/Yekaterinburg');
        $ticket_obj = new Ticket();
        $ticket = $ticket_obj->getTicketByID($_GET['id']);
        $trip_obj = new Trip();
        $trip = $trip_obj->getTripByID($ticket->trip_id);

        $k = $this->getKForRef($ticket->date, $trip->from_time);
        $ref_cost = $ticket->buy_cost*$k;

        return view('pages/refund', ['ticket' => $ticket, 'trip' => $trip, 'ref_cost' => $ref_cost]);
    }

    function getKForRef($date, $time){
        $ticket_time = strtotime($date.' '.$time);
        $now_time = strtotime('now');
        $def_time = ($ticket_time - $now_time)/3600;
        if ($def_time > 6) $k=1;
        elseif ($def_time > 1) $k=0.5;
        else $k=0;
        return $k;
    }

    function letBuy(Request $request): array
    {
        date_default_timezone_set('Asia/Yekaterinburg');
        $ticket_obj = new Ticket();
        $order_id = $ticket_obj->getMaxOrder()+1;
        Cookie::queue('order_id', $order_id, 10);
        $PaymentController_obj = new PaymentController;
        $payment_url = $PaymentController_obj->payCreate($order_id, $_POST['data']['price'], $_POST['data'][1]['fio'], $_POST['data']['email']);

        $payment_id = substr($payment_url, -36, 36);

        $count = $_POST['data']['count'];

        //Подготовка письма
        $trip_obj = new Trip();
        $trip = $trip_obj->getTripById($_POST['data']['trip_id']);

//         $to = $_POST['data']['email'];
//         $subject = 'TK999 - билеты';
//         $message = '<b>Рейс:</b> '.$trip->from.' - '.$trip->to.' — '.$_POST['data']['date'].' в '.$trip->from_time.'<br>
//         Ваши билеты доступны по ссылке:<br>
//         https://tk999.ru/order_show?order_id='.$order_id.'<br>
//         Приятной поездки!';
//         $headers = "MIME-Version: 1.0" . "\r\n" ."Content-type: text/html; charset=UTF-8" . "\r\n";
//
//         mail($to, $subject, $message, $headers);
//         mail('myroyalfamily@ya.ru', 'Новый заказ на сайте', $order_id." - ".$_POST['data'][$i]['fio'], $headers);


        for($i=1; $i<=$count; $i++){
            $ticket_obj = new Ticket();
                $ticket_obj->fio = $_POST['data'][$i]['fio'];
                $ticket_obj->place = $_POST['data'][$i]['place'];
                $ticket_obj->doc = $_POST['data'][$i]['doc'];
                $ticket_obj->phone = '0';
                $ticket_obj->phone = $_POST['data'][$i]['phone'];
                $ticket_obj->tariff = $_POST['data'][$i]['tariff'];
                $ticket_obj->address = '-';
                $ticket_obj->address = $_POST['data'][$i]['address'];
                $ticket_obj->comment = ' ';
                $ticket_obj->comment = $_POST['data']['comment'];
                $ticket_obj->email = ' ';
                $ticket_obj->email = $_POST['data']['email'];
                $ticket_obj->date = $_POST['data']['date'];
                $ticket_obj->trip_id = $_POST['data']['trip_id'];
                if ($_POST['data'][$i]['tariff']=='0')
                    $ticket_obj->buy_cost = $trip->price;
                else
                    $ticket_obj->buy_cost = $trip->price_kids;
                $ticket_obj->order_id = $order_id;
                $ticket_obj->payment_id = $payment_id;
                $ticket_obj->author = $_POST['data']['author'];
                $ticket_obj->payment_status = 'created';
                $ticket_obj->deleted = 0;
            $ticket_obj->save();
        }

        $answer = array(
            'redirect' => $payment_url
        );
        return ($answer);
    }

    function letBooking(Request $request): array
    {
        date_default_timezone_set('Asia/Yekaterinburg');
        $ticket_obj = new Ticket();
        $order_id = $ticket_obj->getMaxOrder()+1;

        $count = $_POST['data']['count'];

        for($i=1; $i<=$count; $i++){
            $ticket_obj = new Ticket();
            $ticket_obj->fio = $_POST['data'][$i]['fio'];
            $ticket_obj->place = $_POST['data'][$i]['place'];
            $ticket_obj->doc = $_POST['data'][$i]['doc'];
            $ticket_obj->phone = '0';
            $ticket_obj->phone = $_POST['data'][$i]['phone'];
            $ticket_obj->tariff = $_POST['data'][$i]['tariff'];
            $ticket_obj->address = '-';
            $ticket_obj->address = $_POST['data'][$i]['address'];
            $ticket_obj->comment = ' ';
            $ticket_obj->comment = $_POST['data']['comment'];
            $ticket_obj->email = ' ';
            $ticket_obj->email = $_POST['data']['email'];
            $ticket_obj->date = $_POST['data']['date'];
            $ticket_obj->trip_id = $_POST['data']['trip_id'];
            $ticket_obj->order_id = $order_id;
            $ticket_obj->payment_id = '-';
            $ticket_obj->author = $_POST['data']['author'];
            $ticket_obj->save();
        }
        $answer = array(
            'redirect' => $count
        );
        return ($answer);
    }

    function checkEmpty(){
        $ticket_obj = new Ticket();

        $busy_arr = array();
        foreach ($_POST['data'] as $query){

            if ($ticket_obj->isBusy($_POST['trip_id'], $_POST['date'], $query['place']))
                array_push($busy_arr, $query['place']);
        }

        $answer = array(
            'tickets' => $busy_arr
        );
        return ($answer);
    }

    function letRefund(){
        $refund = new PaymentController();

        $ticket_obj = new Ticket();
        $ticket = $ticket_obj->getTicketByID($_GET['id']);
        $trip_obj = new Trip();
        $trip = $trip_obj->getTripByID($ticket->trip_id);

        $payment_id = $ticket->payment_id;
        $count = $ticket->buy_cost*$this->getKForRef($ticket->date, $trip->from_time);

        $refund->Refund($payment_id, $count);
        $ticket_obj->setPaymentStatus($payment_id, "refunded");

        $ticket = $ticket_obj->find($_GET['id']);
        $ticket->deleted='1';
        $ticket->save();

        return redirect ( route('RefundPage').'?id='.$_GET['id'] );
    }
}
