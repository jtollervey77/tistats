@extends('layouts.app', ["title"=>"TI Stats"])

@section('content')

<p>Home > Events</p>
<br/>

<h4>Next event : 30/12/2023 @ Chris'</h4>

<br/><br/>

<h5>Record game</h5>
<form method="post" action="/event/update" class="form-event">
	@csrf <!-- {{ csrf_field() }} -->
	<label>#Players</label>
	<select name="players" required="required">
		<?php for($i=1;$i<=6;$i++) { ?>
		<option <?= $i==6?'selected=selected':''?> value="<?= $i?>"><?= $i?></option>
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
    	<select required="required" name="player-<?=$i?>" data-players="<?=$i?>">
    	<option selected="selected" disabled="disabled"></option>
    	@foreach ($players as $player)
    		<option value="{{ $player->name }}">{{ $player->name }}</option>
    	@endforeach
    	</select>
    	<select required="required" name="faction-<?=$i?>" data-players="<?=$i?>">
    	<option selected="selected" disabled="disabled"></option>
    	@foreach ($factions as $faction)
    		<option value="{{ $faction->name }}">{{ $faction->name }}</option>
    	@endforeach    	
    	</select>
    	<input required="required" name="points" class="small" data-players="<?=$i?>"/>
    	<input required="required" type="checkbox" name="won" data-players="<?=$i?>"/>
    	<?php } ?>      	  	    	    		  
	</div>    	    	    	    	
	
	<label>Admin Password</label>		
	<input type="password" required="required" />		
	<input type="submit" />
</form>

<hr/>

<br/><br/>
<p>
some blurb here about last game
</p> 

@endsection