
<?php
$viewData = [
        'page' => 'home',
        'pageTitle' => 'Reset Password | Engage',
]
?>
@extends('layouts.guestMaster')
@section('content')
        

<!-- HEADER -->
<header id="home">
    <!-- Color over Image -->
    <div class="color-overlay">

        <!-- Header -->
        <a name="about"></a>
        <div class="intro-header" style="padding-top: 91px">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-md-3">
                        <div class="login-form" style="padding-bottom: 58%">
                            <div class="">
                                <span style="color: #110805; font-size: 22px">Reset Password</span>
                            </div>
                            {!! Form::open(['url' => '/password/email']) !!}

                                    <!-- Email Form Input -->
                            <div class="form-group {{ $errors->has('email')? 'has-error' : '' }} {{ session('status')? 'has-success' : '' }}">
                                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-Mail Address'])  !!}
                                {!! $errors->first('email','<span class="help-block">:message</span>') !!}
                                <span class="help-block">{{ session('status')? session('status'):'' }}</span>
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Send Password Reset Link', ['class' => 'btn btn-block btn-default']) !!}
                            </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="intro-message">
                    <h1>Frictionless story management </h1>
                    <hr class="intro-divider">
                    <h3>Your news lives on the web forever, <br>earning you new business time and time again</h3>
                </div>
            </div>
            <!-- /.container -->
        </div>
    </div>
    <!-- Color over Image  End -->
</header>
<!-- HEADER END -->

<div class="container">
    <div class="row" style="text-align: center; margin-top: 20px">
        <img src="{{ asset('img/envelop.png') }}" alt="">
        <hr class="intro-divider-full">
        <h2 class="section-heading">Engage is an enterprise platform for newsrooms, contact management, and outreach: the better way to do stakeholder communication.

        </h2>
    </div>
</div>
<div class="content-section-a">

    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-6">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Get Big Publicity with a Engage Press Release</h2>
                <p class="lead">
                    A engage press release can help your business or organization get reach and publicity on the web across search engines, blogs and websites in just a few simple steps.
                </p>
                <div style="padding-left: 30px" class="lead">
                    <ul>
                        <li>Simple.</li>
                        <li>Clear.</li>
                        <li>Flexible.</li>
                    </ul>
                </div>
                <p class="lead">
                    Engage is the technology platform that helps us to communicate our news well to opinion leaders, media and communities.
                </p>
            </div>
            <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                <img class="img-responsive" src="{{ asset('img/mic.png') }}" alt="">
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /.content-section-a -->

<div class="content-section-b">

    <div class="container">

        <div class="row">
            <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Generate Publicity Fast</h2>
                <p class="lead">We send your news to lots journalists and bloggers and hundreds of news sites. Engage gets your story where it needs to go.</p>
                <p class="lead">Engage is a growing socially-shared release service. We target more than 250,000 subscribers who can distribute your release, write about it, tweet about it and share it on Facebook. Creating an Internet sensation is one click away.</p>
            </div>
            <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                <img class="img-responsive" src="{{ asset('img/press-hat.jpg') }}" alt="">
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /.content-section-b -->

<div class="content-section-a">

    <div class="container">

        <div class="row">
            <div class="col-lg-5 col-sm-6">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Do It Yourself With Engage</h2>
                <p class="lead">Even if you've never written a news or press release before, you'll be able to create a press release and distribute search engine friendly releases in minutes. All you need is something to say about your business—a new store, a holiday sale, a new product, a new employee or a charitable endeavor.</p>
                <p class="lead">News release distribution from Engage is supported with resources to help you through every stage of your news release - and our editors are always on hand to help your release turns out right.</p>
            </div>
            <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                <img class="img-responsive" src="{{ asset('img/macbook.png') }}" alt="">
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /.content-section-a -->

<div class="content-section-b">

    <div class="container">

        <div class="row">
            <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading"> Look good, get better results, and reach stakeholders quickly with beautiful multimedia emails</h2>
                <p class="lead">Sending stories to many people can be a drag with traditional tools like Outlook or Gmail: Send limits; large attachments lead to bounce-backs; no tracking.</p>
                <p class="lead">There is a better way. Engage lets you:</p>
                <div style="padding-left: 30px" class="lead">
                    <ul>
                        <li>Create beautiful multimedia emails that load super fast.</li>
                        <li>Personalise bulk multimedia email distribution.</li>
                        <li>E-mail individual contacts with tailored outreach.</li>
                        <li>Be confident that your multimedia email will be delivered looking how it did when you sent it.</li>
                        <li>Track open and click through rates.</li>
                    </ul>
                </div>
                <p class="lead">Journalists and bloggers love Engage because it makes their life easier. Watch your open rates go through the roof.</p>
            </div>
            <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                <img class="img-responsive" src="{{ asset('img/outdated.png') }}" alt="">
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /.content-section-b -->

@endsection
