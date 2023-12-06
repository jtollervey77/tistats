@extends('layouts.app', ["title"=>"TI Stats"])

@section('content')
<div class="grid">
	@foreach ($players as $datum)
	<div class="box"><a href="/player/{{ $datum->getURLName() }}">{{ $datum->getName() }}</a></div>
	@endforeach	
	
	<?php $wins = array(); ?>
	@foreach ($players as $player)
	<?php $wins[$player->name] = $player->getWins() ?>	
	@endforeach	
	<?php arsort($wins) ?>		
</div>

<ul>
	@foreach ($wins as $key=>$value)
		<li>{{ $key }} : {{ $value }}</li>
	@endforeach
</ul>	

<br/><br/><br/><br/>

<div class="grid">
	@foreach ($factions as $datum)
	<div class="box">
		<a href="/faction/{{ $datum->getURLName() }}">{{ $datum->getName() }}</a>
		<p>Current win weighting : {{ $datum->getDeviation() }} </p>
	</div>
	@endforeach
</div>
@endsection