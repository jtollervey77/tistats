
<p>WIP...</p>
<div class="grid">
    <div>        
        <label>Filter pre POK</label>
        <input type="checkbox" />
    </div>    
    
    <div>
        <label>Sort By Weighting</label>
        <input type="checkbox" />
    </div>
</div>
<br/>

<div class="grid">
	@foreach ($factions as $datum)
	<div class="box faction">
		<a href="/faction/{{ $datum->getURLName() }}">
		<div class="faction-img img-{{ $datum->getURLName() }}"></div>
		<p>{{ $datum->getName() }}</p>
		<br/>
		<p>Current win weighting : <span class="<?= $datum->getDeviation()<=0?'red':'green' ?>">{{ $datum->getDeviation() }}</span> </p>
		</a>		
	</div>	
	@endforeach
</div>