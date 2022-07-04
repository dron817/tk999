<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Trip;
use App\Http\Controllers\Payment\PaymentController;

class Console extends Controller
{

    public function index()
    {
        $ticket_obj = new Ticket();
        date_default_timezone_set('Asia/Yekaterinburg');

        $tickets_now = $ticket_obj->getActualTicketsByEmail('myroyalfamily@ya.ru');
        $tickets_old = $ticket_obj->getOldTicketsByEmail('myroyalfamily@ya.ru');

        echo 'Актуальные</br>';
        foreach ($tickets_now as $ticket_now) echo $ticket_now->id.'</br>';
        echo 'Прошедшие</br>';
        foreach ($tickets_old as $ticket_old) echo $ticket_old->id.'</br>';
    }
}
