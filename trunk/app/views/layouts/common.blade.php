<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Avanti Fellows Result Portal</title>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <% HTML::style('//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css') %>
    <% HTML::style('http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css')%>
    <% HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400,700')%>
    <% HTML::style('css/datepicker.css') %>
    <% HTML::style('css/screen.css') %>


    <!--Scripts-->
    <% HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js')%>
    <% HTML::script('http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js') %>
    <% HTML::script('js/bootstrap-datepicker.js')%>
    <% HTML::script('js/moment.min.js')%>
    <% HTML::script('js/app.js')%>
    <% HTML::script('js/jquery.validate.min.js')%>
    <% HTML::script('js/additional-methods.min.js')%>
    <% HTML::script('js/bootbox.min.js')%>
    <% HTML::style('css/app.css') %>
    @if(!Auth::check())
    <style>
        body {
            padding-top: 20px;
            padding-bottom: 0;
        }
    </style>
    @endif
</head>

<body>
@if(Auth::check())

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="/">Avanti Fellows Result Portal</a>

            <div class="nav-collapse collapse">
                @if(Auth::check())
                <ul class="nav">
                    <li class="<?php if ($pageType == 'home') echo 'active' ?>"><a href="<% URL::to('/') %>">Home</a>
                    </li>
                    <li class="<?php if ($pageType == 'import') echo 'active' ?>"><a
                            href="<% URL::to('result/import') %>">Result List</a></li>
                    <li class="<?php if ($pageType == 'register') echo 'active' ?>"><a
                            href="<% URL::to('register/list') %>">Registration List</a></li>
                    <li class="<?php if ($pageType == 'replies') echo 'active' ?>"><a
                            href="<% URL::to('reply/list') %>">Message List</a></li>
                    <li><a href="<% URL::to("/user/logout") %>">Logout</a></li>
                </ul>
                @endif
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
@else

<div class="container">
    <div class="row">
        <div class="span12">
            <img src="<% URL::to('img/avanti-logo.png') %>">
            <hr/>
        </div>
    </div>
</div>
@endif

<div class="container">
    @yield('content')
</div>

</body>
</html>