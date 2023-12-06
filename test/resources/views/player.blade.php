@extends('layouts.app', ["title"=>"TI Stats"])

@section('content')
	@if (isset($player))
	<div class="grid">
		<div class="box">
        	<p>Stats for <b>{{ $player->getName() }}</b></p>
        	<p>Wins : {{ $player->getWins() }} <br/>
        	2nd : {{ $player->getPosition(2) }}<br/>
        	3rd : {{ $player->getPosition(3) }}<br/>
        	4th : {{ $player->getPosition(4) }}<br/>
        	5th : {{ $player->getPosition(5) }}<br/>
        	6th : {{ $player->getPosition(6) }}</p>
    	</div>
    	
    	<div class="box">
        	<b>Favourite Race(s) : </b><br/>{!! $player->getMostPlayed()?$player->getMostPlayed():"" !!}<br/><br/>
        	<b>Best Results As : </b><br/>{!! $player->getBestAs()?$player->getBestAs():"" !!}<br/><br/>
        	<b>Worst Results As : </b><br/>{!! $player->getWorstAs()?$player->getWorstAs():"" !!}<br/><br/>
    	</div>
    	
    	<div class="box">
    	</div>
	</div>
	
	<table class="table table-responsive">
	<tr>
		<th>Date</th>
		<th>Players</th>
		<th>Faction</th>
		<th>Position</th>
		<th>Points</th>
	</tr>
	@foreach ($player->getGames() as $datum)
	<tr>
		<td>{{ $datum->date }}</td>
		<td>{{ $datum->players }}</td>
		<td>{{ $datum->faction }} {{ $datum->pok?'(POK)':'' }}</td>
		<td>{{ $datum->position }}</td>
		<td>{{ $datum->points }}</td>
	</tr>
	@endforeach
	</table>
		
	@else
	<p>Player not found<p>
	@endif
@endsection