<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Controllers\Payment\PaymentController;

class Daemon extends Controller
{

    public function index()
    {
        date_default_timezone_set('Asia/Yekaterinburg');

        $ticket_obj = new Ticket();
        $PaymentController_obj = new PaymentController();
        $tickets = $ticket_obj->getLastWebTickets(10);

        $crr_time = time();
        $time_for_paying = 900;
        echo $crr_time;

        echo "<table border=1>";
        echo "<tr><th>#</th><th>ID</th><th>time</th><th>UNIX time</th><th>UNIX after</th><th>TO DELETE</th><th>payment_id</th><th>payment_status</th></tr>";

        $n=1;
        $deleted = 0;
        foreach ($tickets as $ticket){
            $after = strtotime($ticket->created_at)>1655180634;
            $payed = $PaymentController_obj->checkPayment($ticket->payment_id);
            if (( $time_for_paying + strtotime($ticket->created_at) < $crr_time) and $payed == 'pending' ){
                    $ticket_obj = new Ticket();
                    $ticket = $ticket_obj->find($ticket->id);
                    $ticket->deleted='1';
                    $ticket->save();
            //        if (isset($ticket)) $ticket->delete();
                    $del=0;
                    $deleted++;
            }
            else
                $del = 0;
            echo "<tr><td>".$n."</td>
            <td>".$ticket->order_id."</td>
            <td>".$ticket->created_at."</td>
            <td>".strtotime($ticket->created_at)."</td>
            <td>".$after."</td>
            <td>".$del."</td>
            <td>".$ticket->payment_id."</td>
            <td>".$payed."</td>
            <tr>";
            $n++;
        }
        echo "</table>";
        echo "Удалено билетов: ".$deleted;
        echo "</br>";

//         $file = 'people.txt';
//         // Открываем файл для получения существующего содержимого
//         $current = file_get_contents($file);
//         echo $current;
//         // Добавляем нового человека в файл
//         $current .= "John\n";
//         // Пишем содержимое обратно в файл
//         file_put_contents($file, $current);
    }
}
