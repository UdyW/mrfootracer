<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mr Foot Racer</title>

        <!-- CSS And JavaScript -->
        <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="js/jquery.timepicker.min.js"></script>
		<link rel="stylesheet" type="text/css" href="./css/jquery.timepicker.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo asset('css/skeleton.css')?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo asset('css/normalize.css')?>" />
		        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                margin-top:50px;
            }

            .title {
                font-size: 40px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            
            .panel-heading{
                font-weight:bold;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                @include('layouts.navbar')
            </nav>
        </div>
 		<div class="content">
 		<div class="title m-b-md">Mr.Foot Racer</div>
        	@yield('content')
        </div>
    </body>
</html>