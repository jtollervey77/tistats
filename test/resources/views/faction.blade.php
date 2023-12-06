@extends('layouts.app', ["title"=>"TI Stats"])

@section('content')
	@if (isset($faction))
	
	<div class="grid">
		<div class="box">
    		<p>Stats for <b>{{ $faction->getName() }}</b></p>
    		<p>Wins : {{ $faction->getWins() }} <br/>
        	2nd : {{ $faction->getPosition(2) }}<br/>
        	3rd : {{ $faction->getPosition(3) }}<br/>
        	4th : {{ $faction->getPosition(4) }}<br/>
        	5th : {{ $faction->getPosition(5) }}<br/>
        	6th : {{ $faction->getPosition(6) }}</p>
    	</div>
    	
    	<div class="box">
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