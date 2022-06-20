<?php

namespace App\Exports;

use App\Models\Ticket;
use App\Models\Trip;
use Illuminate\Support\Collection;
use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class TicketsExport implements FromView
{
    public function view():View
    {
        $ticket_obj = new Ticket();
        $trip_obj = new Trip();

        $date = $_GET['date'] ?? date("d.m.Y");
        $trip_num = $_GET['trip_num'] ?? '1';
        $trip = $trip_obj->getFirstTripByNum($_GET['trip_num']);
        $trip_name = $_GET['date'] .' '.$trip->from.' - '.$trip->to.' ('.$trip->from_time.')';
        if (isset($_GET['trip_id'])) $trip_num = $trip->num;
        $tickets_all = new Collection();
        $trips = $trip_obj->getTripsByNum($trip_num);
        foreach ($trips as $trip) {
            $tickets = $ticket_obj->getTicketsByTrip($trip->id, $date);
            foreach ($tickets as $ticket){
                $trip_obj = new Trip();
                $crr_trip = $trip_obj->getTripById($ticket->trip_id);
                $ticket->way = $crr_trip->from.'>'.$crr_trip->to;
                $tickets_all->push($ticket);
            }
        }

        return view('admin.exel', [
                    'invoices' => $tickets,
                    'trip_name' =>$trip_name
                ]);
        return $tickets;
    }
}
