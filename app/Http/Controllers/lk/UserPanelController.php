<?php

namespace App\Http\Controllers\lk;

use Auth;
use App\Models\Trip;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserPanelController extends Controller
{
    function index()
    {
        $ticker_obj = new Ticket();
        $trips_obj = new Trip();
        $tickets_new = $ticker_obj->getActualTicketsByEmail(Auth::user()->email);
        $tickets_old = $ticker_obj->getOldTicketsByEmail(Auth::user()->email);
        $trips = $trips_obj->getAllTrips();
        return view('pages/lk/main', ['tickets_new' => $tickets_new, 'tickets_old' => $tickets_old, 'trips' => $trips]);
    }

}
