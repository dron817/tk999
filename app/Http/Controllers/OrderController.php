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
                if ($payed=='succeeded'){
                    $ticket_obj->setPayedOnTicket($ticket->id);
                }
            }
            else
                $payed = 'succeeded';
        }




        $payment_url = 'https://yoomoney.ru/checkout/payments/v2/contract?orderId='.$payment_id;

        return view('pages/order', ['tickets' => $tickets, 'trip' => $trip_info, 'payed' => $payed, 'payment_url' => $payment_url]);
    }

    function letBuy(Request $request): array
    {
        $ticket_obj = new Ticket();
        $order_id = $ticket_obj->getMaxOrder()+1;
        Cookie::queue('order_id', $order_id, 10);
        $PaymentController_obj = new PaymentController;
        $payment_url = $PaymentController_obj->payCreate($order_id, $_POST['data']['price'], $_POST['data'][1]['fio'], $_POST['data'][1]['phone']);

        $payment_id = substr($payment_url, -36, 36);

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
            $ticket_obj->payment_id = $payment_id;
            $ticket_obj->author = $_POST['data']['author'];
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
}
