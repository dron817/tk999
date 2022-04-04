<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class AdminController extends Controller
{
    function getPanel()
    {
        $ticket_obj = new Ticket();
        $trip_obj = new Trip();


        $date = $_GET['date'] ?? date("d.m.Y");
        $trip_num = $_GET['trip_num'] ?? '1';

        if ((isset($_GET['trip_id']) and !(empty($_GET['trip_id'])))) $trip_num = $trip_obj->getTripById($_GET['trip_id'])->num;

        if (empty($trip_num)) $trip_num = 1;

        $trip = $trip_obj->getFirstTripByNum($trip_num);
        if ($trip->tong==1)
            $free_places = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53];
        else
            $free_places = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];

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


    function delOrder()
    {
        $ticket_obj = new Ticket();
        $ticket = $ticket_obj->find($_GET['ticket_id']);
        if (isset($ticket)) $ticket->delete();

        return $this->getPanel();
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
        if ($trip->tong==1)
            $free_places = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53];
        else
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
