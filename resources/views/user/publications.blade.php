
<?php
$viewData = [
        'page' => 'publications',
        'pageTitle' => 'Home | Engage',
]
?>
@extends('layouts.userMaster')
@section('content')


    <div class="container page-body">
        <div class="col-md-12">
            <h2 class="body-h2">Publications</h2>
            <h3 style="margin-top: 10px" class="body-h3">Send publications to filtered members of your organizations</h3>

            @if(Session::has('global'))
                <div class="alert alert-success">
                    <ul style="list-style: none">
                        <li>{{ Session::get('global') }}</li>
                    </ul>
                </div>
            @endif
            <div style="margin-top: 30px;color: rgba(0, 0, 0, 0.6);">
                <div style="margin-top: 20px">
                    <span class="pull-left" style="font-size: 30px"><i class="fa fa-btn fa-folder-open"></i></span>
                        <span>
                            <b>Create filters for your publication</b><br>
                            You can select the members in your contact database that should receive a particular publication.
                        </span>
                </div>
                <div style="margin-top: 20px">
                    <span class="pull-left" style="font-size: 30px"><i class="fa fa-btn fa-save"></i></span>
                        <span>
                            <b>Publications Records</b><br>
                            Filtered list and sent publications can be saved for future reference.
                        </span>
                </div>
                <div style="margin-top: 20px">
                    <span class="pull-left" style="font-size: 30px"><i class="fa fa-btn fa-search"></i></span>
                        <span>
                            <b>Use contact tags for search</b><br>
                            The tags you created can still be use to improve the contacts search.
                        </span>
                </div>
            </div>
        </div>

        <div class="col-md-12" style="padding-top: 10%;text-align: center">
            <a href="{{ url('/publications/filter') }}" class="btn btn-default">Send publication</a>
            <a href="{{ url('/publications/history') }}" class="btn btn-default">View publication history</a>
        </div>
    </div>
@endsection
