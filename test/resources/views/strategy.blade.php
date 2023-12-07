@extends('layouts.app', ["title"=>"TI Stats"])

@section('content')

<h4>Home > Strategy Guides</h4>
<br/>

<div class="">
	@foreach ($factions as $datum)
	<div class="faction strategy">
		<div>
			<div class="faction-img img-{{ $datum->getURLName() }}"></div>
			<p><a href="/faction/{{ $datum->getURLName() }}">{{ $datum->getName() }}</a></p>
			
			@foreach ($datum->getGuides() as $guide)			
			<h4>{{ $guide->name }} {{ $guide->pok?"POK":"Non POK"}}</h4>
			<div class="read-more">					
				<a href="#" class="cta">Read more</a><br/>
				<div class="cta-content">
				<?php include $_SERVER['DOCUMENT_ROOT']."/resources/guides/".$guide->file  ?>
				</div>									
			</div>			
			<br/>
			@endforeach		
		</div>			
	</div>	
	@endforeach
</div>

@endsection