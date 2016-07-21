
<?php
$viewData = [
        'page' => 'profile',
        'pageTitle' => 'Profile | Engage',
]
?>
@extends('layouts.userMaster')
@section('content')


    <div class="container page-body">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <h2>{{ $user->first_name }}'s Profile</h2>
                <img src="{{ asset('/uploads/avatars/') }}{{ '/'.$user->avatar }}" alt="Profile Image" class="profile-image">
                {!! Form::open(['url' => '/profile', 'enctype' => 'multipart/form-data']) !!}

                <!--Choose a profile photo Form Input-->
                <div class="{{ $errors->has('image')? 'has-error' : '' }}">
                    {!! Form::label('image','Choose a Profile Photo:',['class' => 'bold']) !!}
                    {!! Form::file('image') !!}
                    {!! $errors->first('image','<span class="help-block">:message</span>') !!}
                </div>

                <div class="">
                    {!! Form::submit('Upload', ['class' => 'pull-right btn btn-small btn-primary']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
        <hr style="margin-top: 20px" class="intro-divider">
    </div>
@endsection
