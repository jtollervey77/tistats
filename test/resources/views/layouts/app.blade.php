<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

        <title>@yield('title')</title>

		<script src="/resources/js/jquery-3.7.1.min.js"></script>		
		<script src="/resources/js/jquery.tablesorter.min.js"></script>
		<script src="/resources/js/app.js"></script>

        <!-- Styles -->        
        <link rel="stylesheet" type="text/css" href="/resources/css/app.css">
        <link rel="stylesheet" type="text/css" href="/resources/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/resources/css/theme.bootstrap_4.min.css">                  
        
        <title>
        @isset($title)
            {{ $title }} | 
        @endisset
        {{ config('app.name') }}
    	</title>	
    </head>
    <body>
        <div class="">
        
    		<div class="menu">        			        		                	
                
                <ul>
                	<li><a href="/">Home</a></li>
    				<li><a href="/factions">Factions</a></li>        				
    				<li><a href="/players">Players</a></li>
    				<li><a href="/events">Next Event</a></li>
    				<li><a href="/strategy">Strategy Guides</a></li>
    			</ul>
            </div>
        
        	<div class="header">
        	
        		<div class="form_container">            		            		
            		<form method="post">
                    	<label for="username">Username</label>
                    	<input name="username" type="text" />
                    	
                    	<label for="password">Password</label>
                    	<input name="password" type="password" />
                    	<br/>
                    	<input type="submit" />
                    </form>
				</div>                    
        
        
			</div>                
            
            <div class="content">
            	@section('content')                
            	@show            	
            </div>
            
            <div class="footer">            	
            	<img src="/resources/img/warsun.jpg" />
            </div>
        </div>
    </body>
</html>
