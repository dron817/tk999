<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class Trip extends Model
{
    use HasFactory;

    public function getTrip()
    {
    }

    public function where($from, $to)
    {
        return $user = DB::table('trips')->where('from', '=', $from)->where('to', '=', $to)->get();
    }
}