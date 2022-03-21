<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Trip;
use Illuminate\Support\Collection;

class AdminController extends Controller
{
    function getPanel()
    {
        $ticket_obj = new Ticket();
        $trip_obj = new Trip();

        $date = $_GET['date'] ?? date("d.m.Y");
        $trip_num = $_GET['trip_num'] ?? '1';
        if (isset($_GET['trip_id'])) $trip_num = $trip_obj->getTripById($_GET['trip_id'])->num;
        $tickets_all = new Collection();
        $trips = $trip_obj->getTripsByNum($trip_num);
        foreach ($trips as $trip) {
            $tickets = $ticket_obj->getTicketsByTrip($trip->id, $date);
            foreach ($tickets as $ticket)
                $tickets_all->push($ticket);
        }
        return view('admin.main', ['tickets' => $tickets_all, 'date' => $date, 'trip_num' => $trip_num]);
    }
    function getAdder()
    {
        $date = $_GET['date'] ?? date("d.m.Y");
        $trip_obj = new Trip();
        $trips = $trip_obj->getAllTrips();
        return view('admin.add', ['trips' => $trips, 'date' => $date]);
    }

}
