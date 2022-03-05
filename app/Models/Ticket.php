<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

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
        return $user = DB::table('tickets')->where('trip_id', '=', $trip_id)->where('date', '=', $date)->get();
    }

    public function getTicketsByOrderID($order_id): array
    {
        return $user = DB::table('tickets')->where('order_id', '=', $order_id)->get()->toArray();
    }

    public function getTicketsByNum($trip_num, $date): Collection
    {
        return $user = DB::table('tickets')->where('num', '=', $trip_num)->where('date', '=', $date)->get();
    }

    public function getMaxOrder()
    {
        return DB::table('tickets')->max('order_id');
    }
}
