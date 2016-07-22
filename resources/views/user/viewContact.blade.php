
<?php
use App\Contacts;
$viewData = [
        'page' => 'home',
        'pageTitle' => $contact->surname.' | Engage',
]
?>
@extends('layouts.userMaster')
@section('content')


<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="deleteContactModal">
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
                <button type="button" class="btn btn-default" data-dismiss="modal" id="continueDelete">Continue</button>
            </div>
        </div>
    </div>
</div>
<div class="container page-body">
    <div class="row">
        <div class="col-md-12" style="margin-bottom: 10px;text-align: right">
            <a href="#"><i class="fa fa-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;
            <a href="#" id="deleteContact" data="{{ $contact->id }}"><i class="fa fa-trash"></i> Delete</a>
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
                        {{ $contact->firstname }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Surname
                    </div>
                    <div class="col-md-3">
                        {{ $contact->surname }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        State of Origin
                    </div>
                    <div class="col-md-3">
                        {{ $contact->state_of_origin }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Sex
                    </div>
                    <div class="col-md-3">
                        {{ ucwords($contact->sex) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Current City
                    </div>
                    <div class="col-md-3">
                        {{ $contact->current_city }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Current State
                    </div>
                    <div class="col-md-3">
                        {{ $contact->current_state }}
                    </div>
                </div>

                <h3>Contact Information</h3>
                <hr class="intro-divider" style="margin-bottom: 20px">
                <div class="row">
                    <div class="col-md-2">
                        Email 1
                    </div>
                    <div class="col-md-3">
                        {{ $contact->email_1 }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Email 2
                    </div>
                    <div class="col-md-3">
                        {{ $contact->email_2 }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Phone 1
                    </div>
                    <div class="col-md-3">
                        {{ $contact->telephone_1 }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Phone 2
                    </div>
                    <div class="col-md-3">
                        {{ $contact->telephone_2 }}
                    </div>
                </div>
                <h3>Tags</h3>
                <hr class="intro-divider" style="margin-bottom: 20px">
                <div class="row">
                    <div class="col-md-12">
                        @foreach($tags as $tag)
                            <span class="label label-info" style="font-size: 15px">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
                <h3>Periodicity</h3>
                <hr class="intro-divider" style="margin-bottom: 20px">
                <div class="row">
                    <div class="col-md-2">
                        {{ $contact->periodicity }}
                    </div>
                </div>
                <h3>Media</h3>
                <hr class="intro-divider" style="margin-bottom: 20px">
                <div class="row">
                    <div class="col-md-12">
                        @if(count($medias))
                            @foreach($medias as $media)
                                <span class="label label-default" style="font-size: 15px">{{ $media }}</span>
                            @endforeach
                        @else
                            None
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $('#deleteContact').click(
                function () {
                    $('#deleteContactModal').modal({
                        show: true
                    });
                }
        );
        $('#continueDelete').click(
                function () {
                    $(this).attr('disabled','disabled');
                    var id = $('#deleteContact').attr('data');
                    window.location.replace('http://engage.dev/contacts/delete/'+id);
                }
        );
    </script>
@endsection
