<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Styles -->        
        <link rel="stylesheet" type="text/css" href="/resources/css/app.css">
        <link rel="stylesheet" type="text/css" href="/resources/css/bootstrap.min.css">          
        
        <title>
        @isset($title)
            {{ $title }} | 
        @endisset
        {{ config('app.name') }}
    	</title>	
    </head>
    <body>
        <div class="">
        
        	<div class="flex header">
        	
        		<div class="flex">
            		<a href="/"><img src="/resources/img/ti.png" /></a>
            		
            		<form method="post">
                    	<label for="username">Username</label>
                    	<input name="username" type="text" />
                    	
                    	<label for="password">Password</label>
                    	<input name="password" type="password" />
                    	<br/>
                    	<input type="submit" />
                    </form>
				</div>                    
        
        		<div class="flex">        			        		                	
                    
                    <ul>
        				<li><a href="">Factions</a></li>        				
        				<li><a href="">Players</a></li>
        				<li><a href="">Next Event</a></li>
        				<li><a href="">Strategy Guides</a></li>
        			</ul>
                </div>
			</div>                
            
            <div class="content">
            	@section('content')                
            	@show            	
            </div>
            
            <div class="footer">
            	
            </div>
        </div>
    </body>
</html>
