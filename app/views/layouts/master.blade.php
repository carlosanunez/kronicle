<!DOCTYPE html>
<html>
    <head>
        <title>
            @section('title')
            Blog
            @show
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
            <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-align-left" style="color: #F75F7A"></span>&nbsp;&nbsp;Wilfred's Blog</a>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#"><span class="glyphicon glyphicon-home" style="font-size:80%;"></span>&nbsp;&nbsp;Home</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-th" style="font-size:80%;">&nbsp;&nbsp;Projects</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-inbox" style="font-size:80%;">&nbsp;&nbsp;Contact</a></li>
            </ul>
            </div>
        </div>
        <!-- Container -->
        <div class="container">

            <!-- Content -->
            @yield('content')

        </div>
        <div class="container centered footer">
            <ul class="pagination">
                <li><a href="#"><span class="glyphicon glyphicon-chevron-left" style="font-size: 70%"></span></a></li>
                <li><a href="#" class="active">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-chevron-right" style="font-size: 70%"></a></li>
            </ul>
        </div>
        <!-- Scripts are placed here -->
        {{ HTML::script('js/jquery-1.10.2.min.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}
        {{ HTML::script('js/master.js') }}

    </body>
</html>