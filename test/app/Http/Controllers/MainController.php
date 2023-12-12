<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use App\Models\Player;
use App\Models\Faction;

class MainController extends Controller
{
	public function index() : View
	{    	    
	    $records = DB::select('select * from player order by name ASC');
	    $players = array();
	    foreach ($records as $record) {	        
	        $player = new Player($record, true); 
	        array_push($players, $player);
	    }
	    
	    $records = DB::select('SELECT *, trim(replace(name, "The", "")) as sortname from faction order by sortname ASC');
	    $factions = array();
	    foreach ($records as $record) {
	        $faction = new Faction($record, true);
	        array_push($factions, $faction);
	    }
	    
	    return view('main', array("players" => $players, "factions" => $factions));		
			
	}
}
