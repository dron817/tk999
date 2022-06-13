<?php

namespace App\Http\Controllers;

use App\Models\Ticket;

class Daemon extends Controller
{

    public function index()
    {
//        $ticket_obj = new Ticket();
//        $tickets = $ticket_obj->getTicketByID(7);
//        print_r($tickets);

        $file = 'people.txt';
        // Открываем файл для получения существующего содержимого
        $current = file_get_contents($file);
        echo $current;
        // Добавляем нового человека в файл
        $current .= "John\n";
        // Пишем содержимое обратно в файл
        file_put_contents($file, $current);
    }
}
