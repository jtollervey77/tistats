<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

        <title>@yield('title')</title>

		<script src="/resources/js/jquery-3.7.1.min.js"></script>
		<script src="/resources/bootstrap/js/bootstrap.min.js"></script>				
		<script src="/resources/js/jquery.tablesorter.min.js"></script>
		<script src="/resources/js/app.js"></script>

        <!-- Styles -->        
        <link rel="stylesheet" type="text/css" href="/resources/css/app.css">
        <link rel="stylesheet" type="text/css" href="/resources/css/menu.css">
        <link rel="stylesheet" type="text/css" href="/resources/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/resources/css/theme.bootstrap_4.min.css">                  
        
        <title>
        @isset($title)
            {{ $title }} | 
        @endisset
        {{ config('app.name') }}
    	</title>	
    </head>
    <body>                  
        <section class="top-nav">
            <div>              
            </div>
            <input id="menu-toggle" type="checkbox" />
            <label class='menu-button-container' for="menu-toggle">
            	<div class='menu-button'></div>
          	</label>
            <ul class="menu">
              	<li><a href="/">Home</a></li>
            	<li><a href="/factions">Factions</a></li>        				
            	<li><a href="/players">Players</a></li>
            	<li><a href="/events">Next Event</a></li>
            	<li><a href="/strategy">Strategy Guides</a></li>
            </ul>
            </section>
            
            <div class="header desktop">            
            </div>                
            
            @if(Session::has('message'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
            
            @include("flash-message")
            <div class="content">            	
            	@section('content')                
            	@show            	
            </div>
            
            <div class="footer">            	
            	<img src="/resources/img/warsun.png" />
            </div>        
    </body>
</html>
