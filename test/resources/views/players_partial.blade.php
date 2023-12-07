<div class="">
        
    <table class="table table_players tablesorter">
    	<thead> 
    	<tr>
    		<th>Name</th>
    		<th data-sorter="false">Best results</th>
    		<th data-sorter="false">Worst results</th>
    		<th>Wins</th>
		</tr>
		</thead>
    	<?php $wins = array(); ?>
    	@foreach ($players as $player)
    	<?php $wins[$player->id] = $player ?>	
    	@endforeach	
    	<?php 
    	usort($wins, function($a, $b) {
            return $b->getWins() <=> $a->getWins(); 
    	});
    	?>
    	    	
		<tbody>    	    	
    	@foreach ($wins as $key=>$value)
    		<tr>    			
    			<td><a href="/player/{{ $value->getURLName() }}">{{ $value->getName() }}</a></td>
    			<td>{!! $value->getBestAs() !!}</td>
    			<td>{!! $value->getPlays()===1?"":$value->getWorstAs() !!}</td>
        		<td>{{ $value->getWins() }}</td>
    		</tr>
    	@endforeach
    	</tbody>
	</table>    

</div>   