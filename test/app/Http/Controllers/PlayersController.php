<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use App\Models\Player;

class PlayersController extends Controller
{
	public function index(Request $request) : View
	{    	    
	    $records = DB::select('select * from player order by name ASC');
	    $players = array();
	    foreach ($records as $record) {
	        $player = new Player($record, true);
	        array_push($players, $player);
	    }
	    
	    return view('players', array("players"=>$players));
	}
}
