<div class="grid">
	@foreach ($factions as $datum)
	<div class="box faction">
		<a href="/faction/{{ $datum->getURLName() }}">
		<div class="faction-img img-{{ $datum->getURLName() }}"></div>
		<p>{{ $datum->getName() }}</p>
		<br/>
		<p>Current win weighting : {{ $datum->getDeviation() }} </p>
		</a>		
	</div>	
	@endforeach
</div>