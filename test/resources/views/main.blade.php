@extends('layouts.app', ["title"=>"TI Stats"])

@section('content')
<div class="grid-main">
    <div class="grid">
    	@foreach ($players as $datum)
    	<div class="box"><a href="/player/{{ $datum->getURLName() }}">{{ $datum->getName() }}</a></div>
    	@endforeach				
    </div>
    
    <ul>
    	<?php $wins = array(); ?>
    	@foreach ($players as $player)
    	<?php $wins[$player->name] = $player->getWins() ?>	
    	@endforeach	
    	<?php arsort($wins) ?>
    	
    	@foreach ($wins as $key=>$value)
    		<li>{{ $key }} : {{ $value }}</li>
    	@endforeach
    </ul>	
</div>    

<br/><br/><br/><br/>

<div class="grid">
	@foreach ($factions as $datum)
	<div class="box faction">
		<div class="faction-img img-{{ $datum->getURLName() }}"></div>
		<p><a href="/faction/{{ $datum->getURLName() }}">{{ $datum->getName() }}</a></p>
		<br/>
		<p>Current win weighting : {{ $datum->getDeviation() }} </p>		
	</div>	
	@endforeach
</div>
@endsection