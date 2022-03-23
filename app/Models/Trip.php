<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class Trip extends Model
{
    use HasFactory;

    public function where($from, $to): Collection
    {
        return $user = DB::table('trips')->where('from', '=', $from)->where('to', '=', $to)->get();
    }

    public function getTripsByNum($num): Collection
    {
        return $user = DB::table('trips')->where('num', '=', $num)->get();
    }
    public function getFirstTripByNum($num)
    {
        return $user = DB::table('trips')->where('num', '=', $num)->first();
    }
    public function getAllTrips(): Collection
    {
        return $user = DB::table('trips')->get();
    }
    public function getTripById($id)
    {
        return $user = DB::table('trips')->where('id', '=', $id)->first();
    }
}
