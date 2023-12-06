@extends('layouts.app', ["title"=>"TI Stats"])

@section('content')

<h4>Home > Strategy Guides</h4>
<br/>

<div class="">
	@foreach ($factions as $datum)
	<div class="flex faction">
		<div>
			<div class="faction-img img-{{ $datum->getURLName() }}"></div>
			<p><a href="/faction/{{ $datum->getURLName() }}">{{ $datum->getName() }}</a></p>
			
			@foreach ($datum->getGuides() as $guide)
			<p>
				<h4>{{ $guide->name }} {{ $guide->pok?"POK":"Non POK"}}</h4>
				<span class="readmore">					
					<?php include $_SERVER['DOCUMENT_ROOT']."/resources/guides/".$guide->file  ?>					
				</span>
			</p>
			@endforeach		
		</div>
		<div>
			<h4>Guides</h4>
		</div>			
	</div>	
	@endforeach
</div>

@endsection