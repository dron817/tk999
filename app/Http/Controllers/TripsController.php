<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripsController extends Controller
{
    public function getAll()
    {
        $trip = new Trip;
        $trips = $trip->all();

        return view('pages/main', ['tickets' => $trips]);
    }

    function getTrip(Request $request)
    {
        date_default_timezone_set('Asia/Yekaterinburg');

        if (empty($request->date)) $request->date = date("d.m.Y"); //если в запросе нет даты, берём сегодня
        $from_date_clear = $request->date;
        $from_date = $request->date;

        $from_date_long = $this->RusDate(date('d F Y l', strtotime($from_date)));
        $from_date = $this->RusDate(date('d F', strtotime($from_date)));
        $to_date = $this->RusDate(date('d F', strtotime($request->date) + 86400));

        $after_date = $this->RusDate(date('d.m.Y', strtotime($request->date) + 86400));
        $after_date_text = $to_date;

        $before_date = date('d.m.Y', strtotime($request->date) - 86400);
        $before_date_text = $this->RusDate(date('d F', strtotime($request->date) - 86400));

        if (strtotime($request->date) - 86400 < strtotime(date('d.m.Y')))
            $before_disabled = 'disabled';
        else
            $before_disabled = '';

        // Получение списка маршрутов
        $trip_obj = new Trip;
        $from = $request->from;
        $to = $request->to;
        $trips = $trip_obj->where($from, $to);




        $ticket_buy = 0;
        $tickets_obj = new Ticket;
        foreach ($trips as $trip){
            $num = $trip->num;
            if ($trip->tong == 1) $trip->places = 53; else $trip->places = 20;
            $trips_by_num = $trip_obj->getTripsByNum($num);
            foreach ($trips_by_num as $trip_by_num){
                $tickets = $tickets_obj->getTicketsByTrip($trip_by_num->id, $from_date_clear);
                foreach ($tickets as $ticket){
                    $trip->places--;
                }
            }
        }

//        $ticket = new Ticket;
//        $ticket_buy = 0; // если неизвестно обратное, считаем все места свободными
//        foreach ($trips as $trip) {
//            $trip_data = $trip_obj->getTripById($trip->id); //получаем данные текущего маршрута
//            $num = $trip_data->num;
//            $trips_place = $trip_obj->getTripsByNum($num)->toArray(); //получаем все маршруты с таким же NUM
//            foreach ($trips_place as $trip) {
//                $tickets = $ticket->getTicketsByTrip($trip->id, $from_date_clear)->toArray(); //получаем билеты каждого из маршрутов на эту дату
//                foreach ($tickets as $ticket_once) {
//                    $ticket_buy++;  //занимаем места каждым найденным билетом
//                };
//                $trip->ticket_buy= $ticket_buy;
//                $ticket_buy = 0; // если неизвестно обратное, считаем все места свободными
//            }
//        }

        return view('pages/tickets', ['tickets' => $trips, 'from' => $from, 'to' => $to, 'from_date' => $from_date,
            'from_date_long' => $from_date_long, 'to_date' => $to_date, 'after_date' => $after_date,
            'after_date_text' => $after_date_text, 'before_date' => $before_date, 'before_date_text' => $before_date_text,
            'before_disabled' => $before_disabled, 'from_date_clear' => $from_date_clear]);
    }

}
