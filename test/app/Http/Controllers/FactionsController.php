<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use App\Models\Faction;

class FactionsController extends Controller
{
	public function index(Request $request) : View
	{    	    
	    $records = DB::select('SELECT *, trim(replace(name, "The", "")) as sortname from faction order by sortname ASC');
	    $factions = array();
	    foreach ($records as $record) {
	        $faction = new Faction($record, true);
	        array_push($factions, $faction);
	    }
	    
	    return view('factions', array("factions"=>$factions));
	}
}
