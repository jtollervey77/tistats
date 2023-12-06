<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use App\Models\Faction;

class StrategyController extends Controller
{
	
    public function index() : view {
        
        $records = DB::select('SELECT *, trim(replace(name, "The", "")) as sortname from faction order by sortname ASC');
        $factions = array();
        foreach ($records as $record) {
            $faction = new Faction($record, false);
            array_push($factions, $faction);
        }
        
        return view('strategy', array("factions"=>$factions));
    }
}
