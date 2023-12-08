@extends('layouts.app', ["title"=>"TI Stats"])

@section('content')
	@if (isset($faction))
	
	<div class="grid-main">
		<div class="box">
        	<p>Stats for <b>{{ $faction->getName() }}</b></p>
        	<table class="table player_stats">        		
        		<tr><td>Wins</td><td>{{ $faction->getPosition(1) }}</td></tr>
        		<tr><td>2nd</td><td>{{ $faction->getPosition(2) }}</td></tr>
        		<tr><td>3rd</td><td>{{ $faction->getPosition(3) }}</td></tr>
        		<tr><td>4th</td><td>{{ $faction->getPosition(4) }}</td></tr>
        		<tr><td>5th</td><td>{{ $faction->getPosition(5) }}</td></tr>
        		<tr><td>6th</td><td>{{ $faction->getPosition(6) }}</td></tr>        		        	
        	</table>
    	</div>
    	
    	<div class="box box-shadow">
    		<b>Most Played By : </b><br/>{!! $faction->getMostPlayed()?$faction->getMostPlayed():"" !!}<br/><br/>
        	<b>Best Results By : </b><br/>{!! $faction->getBestAs()?$faction->getBestAs():"" !!}<br/><br/>
        	<b>Worst Results By : </b><br/>{!! $faction->getWorstAs()?$faction->getWorstAs():"" !!}<br/><br/>
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
	@foreach ($faction->getGames() as $datum)
	<tr>
		<td>{{ $datum->date }}</td>
		<td>{{ $datum->players }}</td>
		<td>{{ $datum->player }} {{ $datum->pok?'(POK)':'' }}</td>
		<td>{{ $datum->position }}</td>
		<td>{{ $datum->points }}</td>
	</tr>
	@endforeach
	</table>
		
	@else
	<p>Faction not found<p>
	@endif
@endsection