
<?php
use App\Contacts;
$viewData = [
        'page' => 'home',
        'pageTitle' => $contact->surname.' | Engage',
]
?>
@extends('layouts.userMaster')
@section('content')


    <div class="container page-body">
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 10px;text-align: right">
                <a href="#"><i class="fa fa-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;
                <a href="#"><i class="fa fa-trash"></i> Delete</a>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Contact Details</div>
                <div class="panel-body">
                    <h3>Personal Information</h3>
                    <hr class="intro-divider" style="margin-bottom: 20px">
                    <div class="row">
                        <div class="col-md-2">
                            First name
                        </div>
                        <div class="col-md-3">
                            Ben
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Surname
                        </div>
                        <div class="col-md-3">
                            Ben
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            State of Origin
                        </div>
                        <div class="col-md-3">
                            Ben
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Sex
                        </div>
                        <div class="col-md-3">
                            Ben
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Current City
                        </div>
                        <div class="col-md-3">
                            Ben
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Current State
                        </div>
                        <div class="col-md-3">
                            Ben
                        </div>
                    </div>

                    <h3>Contact Information</h3>
                    <hr class="intro-divider" style="margin-bottom: 20px">
                    <div class="row">
                        <div class="col-md-2">
                            Email 1
                        </div>
                        <div class="col-md-3">
                            Ben
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Email 2
                        </div>
                        <div class="col-md-3">
                            Ben
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Phone 1
                        </div>
                        <div class="col-md-3">
                            Ben
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Phone 2
                        </div>
                        <div class="col-md-3">
                            Ben
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Current City
                        </div>
                        <div class="col-md-3">
                            Ben
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Current State
                        </div>
                        <div class="col-md-3">
                            Ben
                        </div>
                    </div>
                    <h3>Tags</h3>
                    <hr class="intro-divider" style="margin-bottom: 20px">
                    <div class="row">
                        <div class="col-md-2">

                        </div>
                    </div>
                    <h3>Periodicity</h3>
                    <hr class="intro-divider" style="margin-bottom: 20px">
                    <div class="row">
                        <div class="col-md-2">

                        </div>
                    </div>
                    <h3>Media</h3>
                    <hr class="intro-divider" style="margin-bottom: 20px">
                    <div class="row">
                        <div class="col-md-2">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
