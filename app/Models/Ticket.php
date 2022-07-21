<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Models\Ticket;
use App\Models\Trip;

class Ticket extends Model
{
    use HasFactory;

    public function setTicket($ticket): int
    {
        return DB::table($this->table)->insertGetId($ticket);
    }

    public function getTicketByID($id)
    {
        return $user = DB::table('tickets')->where('id', '=', $id)->first();
    }

    public function getTicketsByTrip($trip_id, $date): Collection
    {
        return $user = DB::table('tickets')->where('trip_id', '=', $trip_id)->where('date', '=', $date)->where('deleted', '=', '0')->orderBy('place', 'asc')->get();
    }

    public function getTicketsByOrderID($order_id): array
    {
        return $user = DB::table('tickets')->where('order_id', '=', $order_id)->where('deleted', '=', '0')->get()->toArray();
    }

    public function getTicketsByNum($trip_num, $date): Collection
    {
        return $user = DB::table('tickets')->where('num', '=', $trip_num)->where('date', '=', $date)->where('deleted', '=', '0')->get();
    }

    public function getAllTicketsByEmail($email): Collection
    {
        return $user = DB::table('tickets')->where('email', '=', $email)->orderBy('order_id', 'desc')->get();
    }

    public function getTicketByPaymentId($payment_id){
        return $user = DB::table('tickets')->where('payment_id', '=', $payment_id)->first();
    }

    public function setPaymentStatus($payment_id, $payment_status){
        return DB::table('tickets')->where('payment_id', '=', $payment_id)->update(['payment_status' => $payment_status]);
    }

    public function getActualTicketsByEmail($email): Collection
    {
        date_default_timezone_set('Asia/Yekaterinburg');

        $ticket_obj = new Ticket();
        $trip_obj = new Trip();
        $tickets_now = new Collection();

        $tickets = $this->getAllTicketsByEmail($email);
        foreach ($tickets as $ticket){
                    $trip = $trip_obj->getTripById($ticket->trip_id);
                    $full_time = strtotime($ticket->date.' '.$trip->from_time);
                    if (time() < $full_time)
                        $tickets_now->push($ticket);
                }
        return $tickets_now;
    }
    public function getOldTicketsByEmail($email): Collection
    {
        date_default_timezone_set('Asia/Yekaterinburg');

        $ticket_obj = new Ticket();
        $trip_obj = new Trip();
        $tickets_old = new Collection();

        $tickets = $this->getAllTicketsByEmail($email);
        foreach ($tickets as $ticket){
                    $trip = $trip_obj->getTripById($ticket->trip_id);
                    $full_time = strtotime($ticket->date.' '.$trip->from_time);
                    if (time() > $full_time)
                        $tickets_old->push($ticket);
                }
        return $tickets_old;
    }

    public function getLastWebTickets($limit = 10): Collection
    {
        return DB::table('tickets')->where('author', '=', 'web')->where('deleted', '=', '0')->limit($limit)->orderBy('id', 'desc')->get();
    }

    public function getLastDeletedTickets($limit = 10): Collection
    {
        return DB::table('tickets')->where('author', '=', 'web')->where('deleted', '=', '1')->limit($limit)->orderBy('id', 'desc')->get();
    }

    public function isBusy($trip_id, $date, $place): bool
    {
        $ticket = DB::table('tickets')->where('trip_id', '=', $trip_id)
            ->where('date', '=', $date)
            ->where('place', '=', $place)
            ->get();
        return !empty($ticket);
    }

    public function getMaxOrder()
    {
        return DB::table('tickets')->max('order_id');
    }
}

