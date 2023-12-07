@extends('layouts.app', ["title"=>"TI Stats"])

@section('content')

<h4>Home > Events</h4>
<br/>

<h4>Next event : 30/12/2023 @ Chris'</h4>

<br/><br/>

<h4>Record game</h4>
<form>
	<label>Players</label>
	<select name="players">
		<?php for($i=1;$i<=6;$i++) { ?>
		<option value="<?= $i?>"><?= $i?></option>
		<?php } ?>
	</select>	
	<label>Players</label>
	<?php for($i=1;$i<=6;$i++) { ?>
	<select name="player-<?=$i?>">
	</select>
		
	<select name="race-<?=$i?>">
	</select>
	
	<input name="points" />	
	
	<input type="checkbox" name="won" />
	
	<br/>	
	<?php } ?>
		
	<input type="submit" />
</form>

<hr/>

<br/><br/>
<p>
some blurb here about last game
</p> 

@endsection