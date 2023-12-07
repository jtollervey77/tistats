@extends('layouts.app', ["title"=>"TI Stats"])

@section('content')

<h4>Home > Events</h4>
<br/>

<h4>Next event : 30/12/2023 @ Chris'</h4>

<br/><br/>

<h4>Record game</h4>
<form>
	<label>#Players</label>
	<select name="players">
		<?php for($i=1;$i<=6;$i++) { ?>
		<option value="<?= $i?>"><?= $i?></option>
		<?php } ?>
	</select>	
	<br/><br/>
	
	<div class="grid event desktop">
    	<label>Players</label>
    	<label>Race</label>
    	<label>Points</label>
    	<label>Won?</label>    	
	</div>
	<div class="grid event">
		<?php for($i=1;$i<=6;$i++) { ?>
    	<select name="player-<?=$i?>">
    	</select>
    	<select name="race-<?=$i?>">    	
    	</select>
    	<input name="points" />
    	<input type="checkbox" name="won" />
    	<?php } ?>      	  	    	    		  
	</div>    	    	    	    	
	
	<label>Admin Password</label>		
	<input type="password" />		
	<input type="submit" />
</form>

<hr/>

<br/><br/>
<p>
some blurb here about last game
</p> 

@endsection