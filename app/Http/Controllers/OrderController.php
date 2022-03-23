<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

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

    function letOrder(Request $request, $author='web'): array
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
            $ticket->author = $author;
            $ticket->save();
            $tickets_id[$i]=$ticket->getQueueableId();
        }

        require_once ("sms/sms-prosto_ru.php");
        $key = "Kyi622747f725e569f00ef96ad5ea0eb7faed920e0aac0c3";
//        $phone = $_POST['data'][0]['phone'];
        $phone = "79964443105";
        $result = smsapi_push_msg_nologin_key($key, $phone, "Hello world =)!", array("sender_name"=>"user"));

        $answer = array(
            'redirect' => $order_id
        );
        return ($answer);
    }

    function sendSMS(){
        require_once ("sms/sms-prosto_ru.php");
        $key = "Kyi622747f725e569f00ef96ad5ea0eb7faed920e0aac0c3";
//        $phone = $_POST['data'][0]['phone'];
        $phone = "79964443105";
        $result = smsapi_push_msg_nologin_key($key, $phone, "Hello world =)!", array("sender_name"=>"TK-order"));
        var_dump($result);
    }

}
