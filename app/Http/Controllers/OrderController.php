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
        $data = $ticket->getTicketByID($ticket_id);
        $products = [
            ['title' => 'Product 1', 'price' => 10.99, 'quantity' => 1, 'totals' => 10.99],
            ['title' => 'Product 2', 'price' => 14.99, 'quantity' => 2, 'totals' => 29.98],
            ['title' => 'Product 3', 'price' => 500.00, 'quantity' => 1, 'totals' => 500.00],
            ['title' => 'Product 4', 'price' => 6.99, 'quantity' => 3, 'totals' => 20.97],
        ];

        $total = collect($products)->sum('totals');

        $pdf = PDF::loadView('pdf.ticket', compact('products', 'data', 'total'));
        return $pdf->stream($data->id.'_ticket_'.$data->date.'_'.$data->fio.'.pdf');
//        return view('pages/print', ['tickets' => $data]);
    }

    function getOrder(Request $request){
        $order_id = $_GET['order_id'];
        $ticket = new Ticket();
        $tickets = $ticket->getTicketsByOrderID($order_id);

        $i=0;
        foreach ($tickets as $ticket){
            $tickets_arr[] = json_decode(json_encode($ticket), true);
            $i++;
        }
        return view('pages/order', ['tickets' => $tickets]);
    }

    function letOrder(Request $request): array
    {
        $ticket = new Ticket();
        $order_id = $ticket->getMaxOrder()+1;

//        $ticket = new Ticket();
//        $ticket->fio = 'AG';
//        $ticket->place = '7';
//        $ticket->doc = 'doc';
//        $ticket->phone = '0';
//        $ticket->tariff = '0';
//        $ticket->address = '-';
//        $ticket->date = '22.11.2022';
//        $ticket->trip_id = '6';
//        $ticket->order_id = $order_id;
//        $ticket->save();

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
            $ticket->order_id    = $order_id;
            $ticket->save();
            $tickets_id[$i]=$ticket->getQueueableId();
        }

        $answer = array(
            'redirect' => $order_id
        );
        return ($answer);
    }

}
