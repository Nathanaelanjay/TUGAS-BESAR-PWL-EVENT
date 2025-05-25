<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class DashboardController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('member.dashboard', compact('events'));
    }
}
