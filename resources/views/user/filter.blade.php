
<?php
$viewData = [
        'page' => 'publications',
        'pageTitle' => 'Filter | Engage',
]
?>
@extends('layouts.userMaster')
@section('content')


    <div class="container page-body">


        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="orgError">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Error</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <p id="orgErrorMessage"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            @if(!Session::has('organizations') and !Session::has('functions'))
                <h3>Select filter parameters</h3>
                <hr class="intro-divider">
                <div class="row" style="margin-top: 50px">
                    <div class="col-md-7">
                        <div class="col-md-12">
                            <label for="organization">Add Organization(s)</label><br>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control selectpicker show-tick" name="organization" id="organization">
                                <option>Select Organization</option>
                                @foreach($organization as $org)
                                    <option>{{ $org->organization }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-default pull" id="orgF">Add</button>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="col-md-12">
                            <label for="organization">Add Function(s)</label><br>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control selectpicker show-tick" name="organization" id="function">
                                <option>Select Function/Rank/Title</option>
                                @foreach($functions as $function)
                                    <option>{{ $function->rank }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-default pull-right" id="addFunction">Add</button>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 20px;margin-bottom: 0px">
                    <div class="col-md-6">
                        <div class="alert alert-success">
                            <p id="orgFilterStatus"></p>
                            <ul id="orgListing">

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-warning">
                            <p id="functionFilterStatus"></p>
                            <ul id="functionListing">

                            </ul>
                        </div>
                    </div>
                    <br>
                </div>

                <div class="row" style="text-align: center">
                    <button class="btn btn-default" id="submitFilter">Submit filter parameters</button>
                </div>
            @else
                <div class="row" style="margin-top: 20px;margin-bottom: 0px">
                    <div class="col-md-12">
                        <h3>Selected Filters</h3>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-success">
                            @if(Session::has('organizations'))
                                <h4>Organizations</h4>
                                <ul>
                                    @foreach(Session::get('organizations') as $org)
                                        <li>{{ $org }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <h4>No Organizations submitted</h4>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-warning">
                            @if(Session::has('functions'))
                                <h4>Functions/Ranks</h4>
                                <ul>
                                    @foreach(Session::get('functions') as $fnc)
                                        <li>{{ $fnc }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <h4>No functions submitted</h4>
                            @endif
                        </div>
                    </div>
                    <br>
                </div>

                <div class="row" style="text-align: center">
                    <a href="{{ '/publications/clear' }}" class="btn btn-default"><i class="fa fa-trash"></i> Clear filter parameters</a>
                </div>
            @endif








            <div class="panel panel-default" style="margin-top: 100px">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    @if(Session::has('organizations') or Session::has('functions'))
                        Filtered contacts
                        <span class="pull-right">{{ count($contacts).' contacts returned' }}</span>
                    @else
                        All contacts
                        <span class="pull-right">{{ count($contacts).' contacts returned' }}</span>
                    @endif
                </div>
                <div class="panel-body">
                    @if(count($contacts) == 0)
                        <div>
                            <h3>No contact matches your filter parameter.</h3>
                        </div>
                    @else
                        <p><i class="fa fa-question-circle"></i> Preview your contact list before proceeding to send your publication.</p>
                        <p><i class="fa fa-question-circle"></i> Use the <i class="fa fa-trash"></i> delete icon to remove contacts that shouldn't receive this current publication. (This does not delete the contact from out database.)</p>
                        <p style="text-align: center"><a class="btn btn-primary" href="{{ '/publications/send' }}"><i class="fa fa-arrow-right"></i> Proceed</a></p>



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
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('js/filters.js') }}"></script>
@endsection