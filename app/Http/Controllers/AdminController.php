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
        $free_places = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];

        $date = $_GET['date'] ?? date("d.m.Y");
        $trip_num = $_GET['trip_num'] ?? '1';
        if (isset($_GET['trip_id'])) $trip_num = $trip_obj->getTripById($_GET['trip_id'])->num;
        $tickets_all = new Collection();
        $trips = $trip_obj->getTripsByNum($trip_num);
        foreach ($trips as $trip) {
            $tickets = $ticket_obj->getTicketsByTrip($trip->id, $date);
            foreach ($tickets as $ticket){
                $tickets_all->push($ticket);
                unset($free_places[$ticket->place-1]);
            }
        }
        return view('admin.main', ['tickets' => $tickets_all, 'date' => $date, 'trip_num' => $trip_num, 'free_places' => count($free_places)]);
    }
    function getAdder()
    {
        $trip_obj = new Trip();
        $ticket_obj = new Ticket();

        $date = $_GET['date'] ?? date("d.m.Y");
        if (isset($_GET['trip_id']))
            $trip = $trip_obj->getTripById($_GET['trip_id']);
        else
            $trip = $trip_obj->getFirstTripByNum($_GET['trip_num']);

        $trip_id=$trip->id;

        $tickets = $ticket_obj->getTicketsByTrip($trip->id, $date);
        $free_places = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];
        foreach ($tickets as $ticket){
            unset($free_places[$ticket->place-1]);
        }

        $trips = $trip_obj->getAllTrips();
        return view('admin.add', ['trips' => $trips, 'date' => $date, 'free_places' => $free_places, 'trip_id' => $trip_id]);
    }
    function getPrint()
    {
        $ticket_obj = new Ticket();
        $trip_obj = new Trip();

        $date = $_GET['date'] ?? date("d.m.Y");
        $trip_num = $_GET['trip_num'] ?? '1';
        $trip = $trip_obj->getFirstTripByNum($_GET['trip_num']);
        $trip_name = $trip->num.'. '.$trip->from.' - '.$trip->to.' ('.$trip->from_time.')';
        if (isset($_GET['trip_id'])) $trip_num = $trip->num;
        $tickets_all = new Collection();
        $trips = $trip_obj->getTripsByNum($trip_num);
        foreach ($trips as $trip) {
            $tickets = $ticket_obj->getTicketsByTrip($trip->id, $date);
            foreach ($tickets as $ticket)
                $tickets_all->push($ticket);
        }
        return view('admin.print', ['tickets' => $tickets_all, 'date' => $date, 'trip' => $trip_name]);
    }

}
