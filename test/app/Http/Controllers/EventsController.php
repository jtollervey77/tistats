<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use App\Models\Faction;

class EventsController extends Controller
{
	
    public function index() : view {
        return view('events');
    }
}
