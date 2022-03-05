<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ticket extends Model
{
    use HasFactory;

    public function setTicket($ticket): int
    {
        return DB::table($this->table)->insertGetId($ticket);
    }

    public function getTicketsByTtip($trip_id, $date)
    {
        return $user = DB::table('tickets')->where('trip_id', '=', $trip_id)->where('date', '=', $date)->get();
    }
    public function getTicketsByNum($trip_num, $date)
    {
        return $user = DB::table('tickets')->where('num', '=', $trip_num)->where('date', '=', $date)->get();
    }
}
