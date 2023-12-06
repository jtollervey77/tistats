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