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