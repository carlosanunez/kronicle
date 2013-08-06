<!DOCTYPE html>
<html>
    <head>
        <title>
            @section('title')
            Blog
            @show
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="cache-control" content="max-age=0" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="expires" content="0" />
        <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="pragma" content="no-cache" />
        <link rel="icon" type="image/png" href="img/favicon.png">

        <!-- CSS are placed here -->
        {{ HTML::style('css/bootstrap.css') }}
        {{ HTML::style('css/bootstrap-glyphicons.css') }}
        {{ HTML::style('css/docs.css') }}
        {{ HTML::style('css/master.css')}}

        @section('styles')
            @if ( Auth::user() )
            <style>
                @media all and (max-width: 767px) {
                body {
                    padding-top: 170px;
                }
                }   
            </style>   
            @endif
        @show
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
                    <a href="/"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Home</a></li>
                    @if ($active == 'projects')
                        <li class="active">
                    @else 
                        <li>
                    @endif
                    <a href="/projects"><span class="glyphicon glyphicon-th">&nbsp;&nbsp;Projects</a></li>
                    @if ($active == 'contact')
                        <li class="active">
                    @else 
                        <li>
                    @endif
                    <a href="/contact"><span class="glyphicon glyphicon-inbox">&nbsp;&nbsp;Contact</a></li>
                    <form class="navbar-form pull-left" action="">
                        <input type="text" class="form-control search" placeholder="Search">
                    </form>
                </ul>
                <ul class="nav navbar-nav pull-right">
                    @if ( Auth::guest() )
                        
                    @else
                        @if ($active == 'create')
                            <li id="post-btn"><a href="/create"><span style="color: #349BFB" class="glyphicon glyphicon-plus"></span></a></li>
                        @else
                            <li id="post-btn"><a href="/create"><span class="glyphicon glyphicon-plus"></span></a></li>
                        @endif
                        <li id="logout-btn"><a href="/logout"><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;logout</a></li>
                    @endif
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