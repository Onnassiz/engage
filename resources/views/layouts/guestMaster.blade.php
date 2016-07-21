
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        {{ $viewData['pageTitle'] }}
    </title>

    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">

    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/guest.css') }}">

    <!--Icon Fonts-->
    <link rel="stylesheet" media="screen" href="{{ asset('fonts/font-awesome/font-awesome.min.css') }}">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">


</head>

<body>
@extends('layouts.guestNav')
@yield('content')

<section id="subscribe">
    <div class="container">
        <div class="row">
        <!-- Social Section -->
            <div id="social" class="col-md-12 wow fadeIn">
                <ul class="social">
                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                    <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
            <!-- Social Section End-->
        </div>
    </div>
</section>
<!-- Subscribe Form Section End-->



<!-- Footer Section -->
<footer id="footer">
    <div class="container">
        <p>Designed and Develped by <a href="http://engage.com" title="Bootstrap Templates">Engage Inc.</a></p>
    </div>
</footer>
<!-- footer Section End -->

<!-- Bootstrap JS -->
<!-- jQuery Load -->
<script src="{{ asset('js/jquery-min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!--WOW Scroll Spy-->
<script src="{{ asset('js/wow.js') }}"></script>
<!-- Smooth Scroll -->
<script src="{{ asset('js/smooth-on-scroll.js') }}"></script>
<script src="{{ asset('js/smooth-scroll.js') }}"></script>
<!-- All JS plugin Triggers -->
<script src="{{ asset('js/main.js') }}"></script>

@yield('scripts')
</body>
</html>