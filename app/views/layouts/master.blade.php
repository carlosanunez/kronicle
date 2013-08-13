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
        {{ HTML::style('css/jquery.tagsinput.css') }}
        {{ HTML::style('css/bootstrap-fileupload.css')}}
        {{ HTML::style('css/medium.css') }}

        <style>
        @section('styles')
            
        @show
        </style>

       

    </head>

    <body>
        <div class="navbar navbar-fixed-top header">
            <div class="container">
                 <button style="z-index: 100;" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                </button>
                <a href="/" class="navbar-brand">
                    <span class="glyphicon glyphicon-align-left" style="color: #F75F7A;"></span>
                    @if ($active == 'home')
                        <span style="color: #3BA4FC">
                    @else
                        <span>
                    @endif        
                    Kronicle</span>
                </a>
                <div class="nav-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                    @if ($active == 'tags')
                        <li class="active">
                    @else 
                        <li>
                    @endif
                    <div class="dropdown">
                        <a href="/" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;Tags&nbsp;<span class="glyphicon glyphicon-chevron-down"></span>&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                            <?php 
                                $toptags = Tag::getTopTags();
                            ?>
                            <li class="dropdown-header">Common Tags</li>
                            @if (isset($toptags[0]))
                                @if ($activetag == $toptags[0]['tag'])
                                    <li class="activetag">
                                @else
                                    <li>
                                @endif
                                    <a tabindex="-1" href="/tags/<?php print $toptags[0]['tagID']; ?>"><?php print $toptags[0]['tag']; ?></a></li>
                            @endif
                            @if (isset($toptags[1]))
                                @if ($activetag == $toptags[1]['tag'])
                                    <li class="activetag">
                                @else
                                    <li>
                                @endif
                                    <a tabindex="-1" href="/tags/<?php print $toptags[1]['tagID']; ?>"><?php print $toptags[1]['tag']; ?></a></li>
                            @endif
                            @if (isset($toptags[2]))
                                @if ($activetag == $toptags[2]['tag'])
                                    <li class="activetag">
                                @else
                                    <li>
                                @endif
                                    <a tabindex="-1" href="/tags/<?php print $toptags[2]['tagID']; ?>"><?php print $toptags[2]['tag']; ?></a></li>
                            @endif
                            @if (isset($toptags[3]))
                                @if ($activetag == $toptags[3]['tag'])
                                    <li class="activetag">
                                @else
                                    <li>
                                @endif
                                    <a tabindex="-1" href="/tags/<?php print $toptags[3]['tagID']; ?>"><?php print $toptags[3]['tag']; ?></a></li>
                            @endif
                            @if (isset($toptags[4]))
                                @if ($activetag == $toptags[4]['tag'])
                                    <li class="activetag">
                                @else
                                    <li>
                                @endif
                                    <a tabindex="-1" href="/tags/<?php print $toptags[4]['tagID']; ?>"><?php print $toptags[4]['tag']; ?></a></li>
                            @endif
                            <li class="divider"></li>
                            @if ($activetag == 'allTags')
                                <li class="activetag">
                            @else
                                <li>
                            @endif
                            <a tabindex="-1" href="/tags">All Tags</a></li>
                        </ul>
                    </div>
                    </li>
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
                    <div class="navbar-toggle"></div>
                </ul>
                </div>
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
        {{ HTML::script('js/holder.js') }}
        {{ HTML::script('js/jquery.tagsinput.js') }}
        {{ HTML::script('js/bootstrap-fileupload.js') }}
        {{ HTML::script('js/medium.js') }}

         <script>
        @section('script')

        @show
        </script>
    </body>
</html>