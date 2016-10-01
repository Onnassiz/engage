
<?php
$viewData = [
        'page' => 'publications',
        'pageTitle' => 'View Publication | Engage',
]
?>
@extends('layouts.userMaster')
@section('content')


    <div class="container page-body">
        <h2 class="body-h2">View Publication</h2>
        <h3 style="margin-top: 10px" class="body-h3">You can see the details the selected publication</h3>
        <hr class="intro-divider" style="margin-bottom: 50px">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                {{ $publication->title }}
                <span class="pull-right">Sent on <span style="color: #00CAFB">{{ $publication->created_at }}</span></span>
            </div>
            <div class="panel-body">
                <label for="">Message:</label>
                <div class="alert alert-info">{!! $publication->publication !!}</div>
                <label for="">Recipient(s):</label>
                <p>This publication was sent to the following <span style="color: #00CAFB">{{ count($recipients) }}</span> contact(s)</p>
                <div class="alert alert-info">
                    <ul>
                        @foreach($recipients as $recipient)
                            <li><a href="{{ '/contacts/view/'.$recipient[0] }}">{{ $recipient[1].' '.$recipient[2] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
