<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Ticket;
use Illuminate\Http\Request;

class PlacesController extends Controller
{
    function getPlaces(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $clear_date = $request->date;
        for ($i=1; $i<=53; $i++) $ticket_buy[$i]=0; // если неизвестно обратное, считаем все места свободными

        $ticket = new Ticket;
        $trip = new Trip;

        $trip_data = $trip->getTripById($request->trip_id); //получаем данные текущего маршрута
        $trip_count = $trip_data->price;
        $trip_count_kids = $trip_data->price_kids;
        $num = $trip_data->num;
        $trips = $trip->getTripsByNum($num)->toArray(); //получаем все маршруты с таким же NUM
        foreach ($trips as $trip){
            $tickets = $ticket->getTicketsByTrip($trip->id, $clear_date)->toArray(); //получаем билеты каждого из маршрутов на эту дату
            foreach ($tickets as $ticket_once){
                $ticket_buy[$ticket_once->place]=1;  //занимаем места каждым найденным билетом
            };
        }

        $tong = $trip_data->tong;
        $dempfer_time = $trip_data->dempfer_time;
        $date = $this->RusDate(date('d F', strtotime($clear_date)));
        return view('pages/places', ['from' => $from, 'to' => $to, 'date' => $date, 'ticket_buy' => $ticket_buy,
            'clear_date' => $clear_date, 'trip_id' => $request->trip_id, 'trip_count' => $trip_count,
            'trip_count_kids' => $trip_count_kids, 'tong' => $tong, 'trip_data' => $trip_data
        ]);
    }

}
