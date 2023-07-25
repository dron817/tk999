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
        $trips = $trip->getAllTrips();

        foreach ($trips as $trip){
            $trip->middle = json_decode($trip->middle);

            $trip->string_days='';
            if ($trip->days_of_week==' 1 2 3 4 5 6 7')
                $trip->string_days='ежедневно';
            else{
                if (str_contains($trip->days_of_week, '1'))
                    $trip->string_days .= 'ПН ';
                if (str_contains($trip->days_of_week, '2'))
                    $trip->string_days .= 'ВТ ';
                if (str_contains($trip->days_of_week, '3'))
                    $trip->string_days .= 'СР ';
                if (str_contains($trip->days_of_week, '4'))
                    $trip->string_days .= 'ЧТ ';
                if (str_contains($trip->days_of_week, '5'))
                    $trip->string_days .= 'ПТ ';
                if (str_contains($trip->days_of_week, '6'))
                    $trip->string_days .= 'СБ ';
                if (str_contains($trip->days_of_week, '7'))
                    $trip->string_days .= 'ВС';
            }
        }
        return view('pages/main', ['trips' => $trips]);
    }

    function get_random_time(){
        $URL = 'https://www.youtube.com/watch?v=_6Xa4f6Izh4&t='.rand(1,39000).'s';
        header('Location: '.$URL);
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
        //if (empty($request->date))
        $from = $request->from;
        $to = $request->to;
        $trips = $trip_obj->where($from, $to);


// -------Подсчёт кол-ва оставшихся мест
//         $tickets_obj = new Ticket;
//         foreach ($trips as $trip){
//             $num = $trip->num;
//             if ($trip->tong == 1) $trip->places = 53; else $trip->places = 20;
//             $trips_by_num = $trip_obj->getTripsByNum($num);
//             foreach ($trips_by_num as $trip_by_num){
//                 $tickets = $tickets_obj->getTicketsByTrip($trip_by_num->id, $from_date_clear);
//                 foreach ($tickets as $ticket){
//                     $trip->places--;
//                 }
//             }
//         }

        foreach ($trips as $trip)
            $trip->middle = json_decode($trip->middle);

//         $trip->middle = '';

        return view('pages/tickets', ['tickets' => $trips, 'from' => $from, 'to' => $to, 'from_date' => $from_date,
            'from_date_long' => $from_date_long, 'to_date' => $to_date, 'after_date' => $after_date,
            'after_date_text' => $after_date_text, 'before_date' => $before_date, 'before_date_text' => $before_date_text,
            'before_disabled' => $before_disabled, 'from_date_clear' => $from_date_clear]);
    }

}
