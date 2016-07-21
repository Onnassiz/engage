
<?php
$viewData = [
        'page' => 'home',
        'pageTitle' => 'Create an Accout | Engage',
]
?>
@extends('layouts.guestMaster')
@section('content')
        <!-- HEADER -->
<header id="home">
    <!-- Color over Image -->
    <div class="color-overlay">

        <!-- navbar log -->
        <div class="navbar logo-nav">

            <div class="row">
                <div class="col-sm-6 col-md-6 col-xs-4">
                    <div class="navbar-header">
                        <div class="logo">
                            <a href=""><img src="{{ asset('img/logo.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-8">
                    <div class="pull-right">
                        <a class="btn btn-common wow bounceIn" href="#main-features">Explore Features</a>
                    </div>
                </div>
            </div>

        </div>

        <!--Register div-->
        <div class="row" style="margin-right: 5px; padding: 0px 0px;" id="register">
            <div class="col-md-3 pull-right">
                <div class="login-form">
                    <div class="">
                        <span style="color: #ffffff; font-size: 19px">Sign up</span>
                        <span style="color:  #ffffff" class="pull-right">or <a href="/" id="createAccount">Sign in</a></span>
                        <br/><br/>
                    </div>
                    {!! Form::open(['url' => '/register']) !!}

                            <!-- First name Form Input -->
                    <div class="form-group {{ $errors->has('email')? 'has-error' : '' }}">
                        {!! Form::text('firstName', null, ['class' => 'form-control', 'placeholder' => 'First name'])  !!}
                        {!! $errors->first('firstName','<span class="help-block">:message</span>') !!}
                    </div>

                    <!-- Surname Form Input -->
                    <div class="form-group {{ $errors->has('surname')? 'has-error' : '' }}">
                        {!! Form::text('surname', null, ['class' => 'form-control', 'placeholder' => 'Surname'])  !!}
                        {!! $errors->first('surname','<span class="help-block">:message</span>') !!}
                    </div>

                    <!-- Email Form Input -->
                    <div class="form-group {{ $errors->has('email')? 'has-error' : '' }}">
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email'])  !!}
                        {!! $errors->first('email','<span class="help-block">:message</span>') !!}
                    </div>

                    <!-- Password Form Input -->
                    <div class="form-group {{ $errors->has('password')? 'has-error' : '' }}">
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                        {!! $errors->first('password','<span class="help-block">:message</span>') !!}
                    </div>

                    <!-- Register Form Input-->
                    <div class="form-group">
                        {!! Form::submit('Sign up', ['class' => 'btn btn-default pull-right']) !!}
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
        <!-- Heading And Texts -->

        <div class="row" style="padding: 35px 0px;">
            <div class="col-md-10 col-md-offset-1 intro-section">
                <h1 class="intro">Frictionless story management  for brands.</h1>
                <p class="sub-heading">
                    Your news lives on the web forever, earning you new business time and time again.
                </p>
            </div>
        </div>

        <!-- Heading And Texts End-->

    </div>
    <!-- Color over Image  End -->
</header>
<!-- HEADER END -->

<!-- Features Section -->
<section id="main-features">
    <div class="feature-list item-1">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6" style="padding: 45px 0px">
                    <img src="{{ asset('img/img5.jpg') }}" class="wow fadeInLeft" data-wow-duration="0.80s" alt="">
                </div>
                <div class="col-md-6">
                    <div class="feature-content wow fadeInRight" data-wow-duration="0.80s">
                        <h3 class="small-title">Get Big Publicity with a Engage Press Release</h3>
                        <p>
                            A engage press release can help your business or organization get reach and publicity on the web across search engines, blogs and websites in just a few simple steps.
                        </p>
                        <div style="padding-left: 30px">
                            <ul>
                                <li>Simple.</li>
                                <li>Clear.</li>
                                <li>Flexible.</li>
                            </ul>
                        </div>
                        <p>
                            Engage is the technology platform that helps us to communicate our news well to opinion leaders, media and communities.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="feature-list item-2">
        <div class="">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="feature-content wow fadeInLeft" data-wow-duration="0.80s">
                        <h3 class="small-title">Generate Publicity Fast</h3>
                        <p>
                            We send your news to lots journalists and bloggers and hundreds of news sites. Engage gets your story where it needs to go.
                        </p>
                        <p>
                            Engage is a growing socially-shared release service. We target more than 250,000 subscribers who can distribute your release, write about it, tweet about it and share it on Facebook. Creating an Internet sensation is one click away.
                        </p>
                    </div>
                </div>

                <div class="col-sm-6 col-md-5">
                    <img src="{{ asset('img/img2.jpg') }}" class="wow fadeInRight" data-wow-duration="0.80s" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="feature-list item-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6" style="padding: 60px 0px">
                    <img src="{{ asset('img/img4.jpg') }}" class="wow fadeInLeft" data-wow-duration="0.80s" alt="">
                </div>
                <div class="col-md-6">
                    <div class="feature-content wow fadeInRight" data-wow-duration="0.80s">
                        <h3 class="small-title">Do It Yourself With Engage</h3>
                        <p>
                            Even if you've never written a news or press release before, you'll be able to create a press release and distribute search engine friendly releases in minutes. All you need is something to say about your business—a new store, a holiday sale, a new product, a new employee or a charitable endeavor.
                        </p>
                        <p>
                            News release distribution from Engage is supported with resources to help you through every stage of your news release - and our editors are always on hand to help your release turns out right.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
