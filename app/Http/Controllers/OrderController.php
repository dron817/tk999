<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Ticket;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function letOrder(Request $request): array
    {
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
            $ticket->save();
            $tickets_id[$i]=$ticket->getQueueableId();
        }

        $answer = array(
            'a' => print_r($tickets_id, 1)
        );
        return ($answer);
    }

}
