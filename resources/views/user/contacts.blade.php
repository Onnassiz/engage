
<?php
$viewData = [
        'page' => 'contacts',
        'pageTitle' => 'Contacts | Engage',
];
?>
@extends('layouts.userMaster')
@section('content')

    <div class="container page-body">
        @if(Session::has('global'))
            <div class="alert alert-success">
                <ul style="list-style: none">
                    <li>{{ Session::get('global') }}</li>
                </ul>
            </div>
        @endif
        <div class="row">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    <ul style="list-style: none">
                        <li>{{ Session::get('message') }}</li>
                    </ul>
                </div>
            @endif
            <div class="col-md-6">
                <h2 class="body-h2">Contacts</h2>
                <h3 style="margin-top: 10px" class="body-h3">Build a contact list for your organization</h3>

                <div style="margin-top: 30px;color: rgba(0, 0, 0, 0.6);">
                    <div style="margin-top: 20px">
                        <span class="pull-left" style="font-size: 30px"><i class="fa fa-btn fa-cloud-upload"></i></span>
                        <span>
                            <b>Store your records safe and secure.</b><br>
                            Your contacts are stored safely and only you can access them.
                        </span>
                    </div>
                    <div style="margin-top: 20px">
                        <span class="pull-left" style="font-size: 30px"><i class="fa fa-btn fa-users"></i></span>
                        <span>
                            <b>Centralize</b><br>
                            Use one centralized contact database with your entire team.
                        </span>
                    </div>
                    <div style="margin-top: 20px">
                        <span class="pull-left" style="font-size: 30px"><i class="fa fa-btn fa-cloud-download"></i></span>
                        <span>
                            <b>Ask a friend</b><br>
                            Ask and Import contacts from a friend's contact storage.
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-6" style="padding-top: 10%;">
                <a href="{{ url('/contacts/create') }}" class="btn btn-default">Add a contact</a>
                <a href="{{ url('/contacts/importAndExport') }}" class="btn btn-default">Import your contacts</a>
            </div>
        </div>
        <div class="row" style="margin-top: 40px;">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">Contacts</div>
                    <div class="panel-body">
                        {!! Form::open(['url' => '/contacts', 'class' => 'form-inline']) !!}

                        <div class="col-md-4">
                            <!-- Search Form Input -->
                            <div class="form-group pull-left {{ $errors->has('search')? 'has-error' : '' }}">
                                {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Search'])  !!}
                                {!! $errors->first('search','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <input class="btn btn-default" type="submit" value="Search" style="width: 100px">
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>

                    <!-- Table -->
                    <div style="padding: 30px">
                        <table class="table contacts" style="color: rgba(0, 0, 0, 0.6);">
                            @foreach($contacts as $contact)
                                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="{{ 'deleteContactModal'.$contact->id }}">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title">Confirm Delete</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div>
                                                    <p>You are about to delete <b>{{ $contact->surname.' '.$contact->firstname }}</b> from your contact list.</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                                                <button data="{{ $contact->id }}" type="button" class="btn btn-default continueDelete" data-dismiss="modal">Continue</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <tr>
                                    <td>
                                        <a href="{{ '/contacts/view/'.$contact->key }}">{{ $contact->firstname.' '.$contact->surname }}</a><br>
                                        {{ $contact->rank.' at' }}
                                        <a href="#">{{ \App\Organization::whereId(\App\ContactOrganization::whereContactId($contact->id)->first()->organization_id)->first()->organization }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ '/contacts/view/'.$contact->key }}">{{ $contact->email_1 }}</a><br>
                                        {{ $contact->telephone_1.' ' }}
                                        {{ $contact->telephone_2 }}
                                    </td>
                                    <td>
                                        <a href="{{ '/contacts/edit/'.$contact->key }}" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                        <a href="#" class="deleteContact" data="{{ $contact->id }}" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('.deleteContact').click(
                function () {
                    var id = $(this).attr('data');
                    $('#deleteContactModal'+id).modal({
                        show: true
                    });
                }
        );
        $('.continueDelete').click(
                function () {
                    $(this).attr('disabled','disabled');
                    var id = $(this).attr('data');
                    window.location.replace('http://engage.dev/contacts/delete/'+id);
                }
        );
    </script>
@endsection

