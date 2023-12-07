@extends('layouts.app', ["title"=>"TI Stats"])

@section('content')
	@if (isset($player))
	<div class="grid-main">
		<div class="box">
        	<p>Stats for <b>{{ $player->getName() }}</b></p>
        	<table class="table player_stats">        		
        		<tr><td>Wins</td><td>{{ $player->getPosition(1) }}</td></tr>
        		<tr><td>2nd</td><td>{{ $player->getPosition(2) }}</td></tr>
        		<tr><td>3rd</td><td>{{ $player->getPosition(3) }}</td></tr>
        		<tr><td>4th</td><td>{{ $player->getPosition(4) }}</td></tr>
        		<tr><td>5th</td><td>{{ $player->getPosition(5) }}</td></tr>
        		<tr><td>6th</td><td>{{ $player->getPosition(6) }}</td></tr>        		        	
        	</table>
    	</div>
    	
    	<div class="box box-shadow">
        	<b>Favourite Race(s) : </b><br/>{!! $player->getMostPlayed()?$player->getMostPlayed():"" !!}<br/><br/>
        	<b>Best Results As : </b><br/>{!! $player->getBestAs()?$player->getBestAs():"" !!}<br/><br/>
        	<b>Worst Results As : </b><br/>{!! $player->getWorstAs()?$player->getWorstAs():"" !!}<br/><br/>
    	</div>
    	    	
	</div>
	
	<table class="table table-responsive tablesorter">
	<thead>
	<tr>
		<th>Date</th>
		<th>Players</th>
		<th>Faction</th>
		<th>Position</th>
		<th>Points</th>
	</tr>
	</thead>
	<tbody>
	@foreach ($player->getGames() as $datum)
	<tr>
		<td>{{ $datum->date }}</td>
		<td>{{ $datum->players }}</td>
		<td>{{ $datum->faction }} {{ $datum->pok?'(POK)':'' }}</td>
		<td>{{ $datum->position }}</td>
		<td>{{ $datum->points }}</td>
	</tr>	
	@endforeach
	</tbody>
	</table>
		
	@else
	<p>Player not found<p>
	@endif
@endsection