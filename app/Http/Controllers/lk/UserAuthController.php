<?php

namespace App\Http\Controllers\lk;

use App\Models\Trip;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAuthController extends Controller
{
    function index()
    {
        return view('pages/lk/auth');
    }

}
