<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use App\Models\Faction;

class FactionController extends Controller
{
	public function index(Request $request, $id) : View
	{    	    
 	    	    
	    $faction = null; 	    	   
	    
	    if($id) {	        
	        $record = DB::table("faction")->whereRaw("lower(shortName) = ?", array($id))->first();
	        if($record) $faction = new Faction($record, true);
	    }
	    
	    return view('faction', array("faction" => $faction));
	}
}
