<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use App\Models\Player;

class PlayerController extends Controller
{
	public function index(Request $request, $id) : View
	{    	    
 	    	    
	    $player = null; 	    	   
	    
	    if($id) {
	        $record = DB::table("player")->whereRaw("lower(name) = ?", array($id))->first();
	        if($record) $player = new Player($record, true);
	    }
	    
	    return view('player', array("player" => $player));
	}
}
