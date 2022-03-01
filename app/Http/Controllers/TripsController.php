<?php

namespace App\Http\Controllers;

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

    function getTrip(Request $request){
        date_default_timezone_set('Asia/Yekaterinburg');

        function RusDate($date){ //русификация даты
            $_wordsList = array("January" => "Января", "February" => "Февраля", "March" => "Марта", "April" => "Апреля", "May" => "Мая", "June" => "Июня",
                "July" => "Июля", "August" => "Августа", "September" => "Сентября", "October" => "Октября", "November" => "Ноября", "December" => "Декабря",
                "Monday" => "понедельник", "Tuesday" => "вторник", "Wednesday" => "среда", "Thursday" => "четверг", "Friday" => "пятница", "Saturday" => "суббота",
                "Sunday" => "воскресение");

            $_mD_F = date("F", strtotime($date)); //для замены
            $_mD_l = date("l", strtotime($date)); //для замены
            $date = str_replace($_mD_F, $_wordsList[$_mD_F], $date);
            return str_replace($_mD_l, $_wordsList[$_mD_l], $date);

        }


        if (empty($request->date)) $request->date=date("Y-m-d"); //если в запросе нет даты, берём сегодня
        $from_date_clear = $request->date;
        $from_date = $request->date;

        $from_date_long = RusDate(date('d F Y l', strtotime($from_date)));
        $from_date = RusDate(date('d F', strtotime($from_date)));
        $to_date = RusDate(date('d F',strtotime($request->date) + 86400));

        $after_date = RusDate(date('d.m.Y',strtotime($request->date) + 86400));
        $after_date_text = $to_date;

        $before_date = date('d.m.Y',strtotime($request->date) - 86400);
        $before_date_text = RusDate(date('d F',strtotime($request->date) - 86400));

        if (strtotime($request->date) - 86400 < strtotime(date('d.m.Y')))
            $before_disabled = 'disabled';
        else
            $before_disabled = '';

        // Получение списка маршрутов
        $trip = new Trip;
        $from = $request->from;
        $to = $request->to;
        $trips = $trip->where($from, $to);

        return view('pages/tickets', ['tickets' => $trips, 'from' => $from, 'to' => $to, 'from_date' => $from_date,
            'from_date_long' => $from_date_long, 'to_date' => $to_date, 'after_date' => $after_date,
            'after_date_text'=> $after_date_text, 'before_date' => $before_date, 'before_date_text' => $before_date_text,
            'before_disabled' => $before_disabled, 'from_date_clear' => $from_date_clear]);
    }

}