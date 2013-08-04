<!DOCTYPE html>
<html>
    <head>
        <title>
            @section('title')
            Blog
            @show
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="img/favicon.png">

        <!-- CSS are placed here -->
        {{ HTML::style('css/bootstrap.css') }}
        {{ HTML::style('css/bootstrap-responsive.css') }}
        {{ HTML::style('css/bootstrap-glyphicons.css') }}
        {{ HTML::style('css/docs.css') }}
        {{ HTML::style('css/master.css')}}

        <style>
        @section('styles')
            
        @show
        </style>
    </head>

    <body>
        <div class="navbar navbar-fixed-top header blur">
            <div class="container">
            <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-align-left" style="color: #F75F7A"></span>&nbsp;&nbsp;Wilfred's Blog</a>
            <ul class="nav navbar-nav">
                @if ($active == 'home')
                    <li class="active">
                @else 
                    <li>
                @endif
                <a href="/"><span class="glyphicon glyphicon-home" style="font-size:80%;"></span>&nbsp;&nbsp;Home</a></li>
                @if ($active == 'projects')
                    <li class="active">
                @else 
                    <li>
                @endif
                <a href="/projects"><span class="glyphicon glyphicon-th" style="font-size:80%;">&nbsp;&nbsp;Projects</a></li>
                @if ($active == 'contact')
                    <li class="active">
                @else 
                    <li>
                @endif
                <a href="/contact"><span class="glyphicon glyphicon-inbox" style="font-size:80%;">&nbsp;&nbsp;Contact</a></li>
            </ul>
            </div>
        </div>
        <!-- Container -->
        <div class="container">

            <!-- Content -->
            @yield('content')

        </div>
        
        <!-- Scripts are placed here -->
        {{ HTML::script('js/jquery-1.10.2.min.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}
        {{ HTML::script('js/master.js') }}

    </body>
</html>