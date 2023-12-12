<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class EventsController extends Controller
{
	
    public function index() : view 
    {
        
        $players = DB::select('select * from player order by name ASC');                
        $factions = DB::select('SELECT *, trim(replace(name, "The", "")) as sortname from faction order by sortname ASC');        
        
        return view('events', array("players"=>$players, "factions"=>$factions));
    }
    
    public function update()
    {
        //Session::flash('message', 'This is a message!'); 
        
        return  redirect('/events')->with('error', 'Admin password incorrect.');
    }
}
