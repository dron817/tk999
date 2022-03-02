<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function RusDate($date){ //русификация даты
        $_wordsList = array("January" => "Января", "February" => "Февраля", "March" => "Марта", "April" => "Апреля", "May" => "Мая", "June" => "Июня",
            "July" => "Июля", "August" => "Августа", "September" => "Сентября", "October" => "Октября", "November" => "Ноября", "December" => "Декабря",
            "Monday" => "понедельник", "Tuesday" => "вторник", "Wednesday" => "среда", "Thursday" => "четверг", "Friday" => "пятница", "Saturday" => "суббота",
            "Sunday" => "воскресение");

        $_mD_F = date("F", strtotime($date)); //для замены
        $_mD_l = date("l", strtotime($date)); //для замены
        $date = str_replace($_mD_F, $_wordsList[$_mD_F], $date);
        return str_replace($_mD_l, $_wordsList[$_mD_l], $date);

    }
}

