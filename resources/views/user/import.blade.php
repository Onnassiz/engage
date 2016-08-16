<?php
$viewData = [
        'page' => 'contacts',
        'pageTitle' => 'Import | Engage',
]
?>
@extends('layouts.userMaster')
@section('content')


    <div class="container page-body">
        <h2 class="body-h2">Import Contacts</h2>
        <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist" style="margin-bottom: 40px">
                <li role="presentation" class="{{ ($option == 'upload')?'active':'' }}"><a href="{{ '/contacts/import/upload' }}">Add Contact File</a></li>
                <li role="presentation" class="{{ ($option == 'match')?'active':'' }}"><a href="{{ '/contacts/import/match' }}">Match Fields</a></li>
                <li role="presentation" class="{{ ($option == 'main')?'active':'' }}"><a href="{{ '/contacts/import/main' }}">Import</a></li>
                <li role="presentation" class="{{ ($option == 'review')?'active':'' }}"><a href="{{ '/contacts/import/review' }}">Review</a></li>
            </ul>

            
            <!-- Tab panes -->
            <div class="tab-content" style="color: rgba(0, 0, 0, 0.6);">
                <div role="tabpanel" class="tab-pane {{ ($option == 'upload')?'active':'' }}">
                    @if(Session::has('global'))
                        <div class="alert alert-warning">
                            <ul style="list-style: none">
                                <li>{{ Session::get('global') }}</li>
                            </ul>
                        </div>
                    @endif
                        @if(Session::has('error'))
                            <div class="alert alert-warning">
                                <ul style="list-style: none">
                                    <li>
                                        Out of format. Your spreadsheet number of columns must be 15.
                                        You can download and review the
                                        <a href="{{ '/contacts/importFileExample' }}" class="alert-link">example contact list</a>
                                        to ensure it matches your list format.
                                    </li>
                                </ul>
                            </div>
                        @endif
                        @if(Session::has('error2'))
                            <div class="alert alert-warning">
                                <ul style="list-style: none">
                                    <li>
                                        Out of format. Ensure you do not modify the list headers/titles.
                                        You can download and review the
                                        <a href="{{ '/contacts/importFileExample' }}" class="alert-link">example contact list</a>
                                        to ensure it matches your list format.
                                    </li>
                                </ul>
                            </div>
                        @endif
                        @if(Session::has('empty'))
                            <div class="alert alert-warning">
                                <ul style="list-style: none">
                                    <li>
                                        You uploaded an empty spreadsheet.
                                        You can download and review the
                                        <a href="{{ '/contacts/importFileExample' }}" class="alert-link">example contact list</a>
                                        to ensure it matches your list format.
                                    </li>
                                </ul>
                            </div>
                        @endif
                    <div class="col-md-5">
                        <h3>Upload a contact spreadsheet</h3>
                        {!! Form::open(['url' => '/contacts/import', 'enctype' => 'multipart/form-data']) !!}
                        <label class="btn btn-default btn-file">
                            Select an Excel or .csv file <input name="csv" type="file" style="display: none;" onchange="this.form.submit();">
                            <input type="hidden" value="mess" name="mess">
                        </label>
                        {!! Form::close() !!}
                        <div class="alert alert-info" style="margin-top: 40px">
                            <p>
                                This can be an <b>Excel</b> file or a .csv file.
                            </p>
                            <p>
                                You may have difficulties importing your contact list. You can download and review the
                                <a href="{{ '/contacts/importFileExample' }}" class="alert-link">example contact list</a>
                                to ensure it matches your list format.
                            </p>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane {{ ($option == 'match')?'active':'' }}">
                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="duplicatesError">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">Duplicate Headers</h4>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <p>You have duplicate <b>headers</b>. Only one header should be matched to one column.</p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if( $contacts->count())
                        <div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 style="margin-top: 0px">Preview Contacts</h4>
                                </div>
                                <div class="col-md-12" style="text-align: right; margin-bottom: 10px">
                                    <a href="{{ '/contacts/cancelAndReturn/'}}" class="pull-left"><i class="fa fa-times"></i> Cancel and return</a>&nbsp;&nbsp;&nbsp;
                                    <a href="#" id="startImport"><i class="fa fa-upload"></i> Import</a>
                                </div>
                            </div>
                        </div>
                        <div style="width: 100%; max-height: 450px; overflow: auto">
                            <table class="table table-bordered" style="table-layout: fixed;width: 3500px;">
                                <tr class="thead active">
                                    <th>firstname</th>
                                    <th>surname</th>
                                    <th>state_of_origin</th>
                                    <th>sex</th>
                                    <th>organization</th>
                                    <th>function</th>
                                    <th>current_city</th>
                                    <th>current_state</th>
                                    <th>email_1</th>
                                    <th>email_2</th>
                                    <th>telephone_1</th>
                                    <th>telephone_2</th>
                                    <th>periodicity</th>
                                    <th>media</th>
                                    <th>tags</th>
                                </tr>
                                <tr class="thead active">
                                    <td>Import as</td>
                                    <td>Import as</td>
                                    <td>Import as</td>
                                    <td>Import as</td>
                                    <td>Import as</td>
                                    <td>Import as</td>
                                    <td>Import as</td>
                                    <td>Import as</td>
                                    <td>Import as</td>
                                    <td>Import as</td>
                                    <td>Import as</td>
                                    <td>Import as</td>
                                    <td>Import as</td>
                                    <td>Import as</td>
                                    <td>Import as</td>
                                </tr>
                                <tr class="thead active">
                                    <td>
                                        <div class="input-group spinner">
                                            <input type="text" class="form-control" id="0" value="First name" readonly>
                                            <div class="input-group-btn-vertical">
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group spinner">
                                            <input type="text" class="form-control" id="1" value="Surname" readonly>
                                            <div class="input-group-btn-vertical">
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group spinner">
                                            <input type="text" class="form-control" id="2" value="State of origin" readonly>
                                            <div class="input-group-btn-vertical">
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group spinner">
                                            <input type="text" class="form-control" id="3" value="Sex" readonly>
                                            <div class="input-group-btn-vertical">
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group spinner">
                                            <input type="text" class="form-control" id="4" value="Organization" readonly>
                                            <div class="input-group-btn-vertical">
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group spinner">
                                            <input type="text" class="form-control" id="5" value="Function/Rank/Title" readonly>
                                            <div class="input-group-btn-vertical">
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group spinner">
                                            <input type="text" class="form-control" id="6" value="Current city" readonly>
                                            <div class="input-group-btn-vertical">
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group spinner">
                                            <input type="text" class="form-control" id="7" value="Current state" readonly>
                                            <div class="input-group-btn-vertical">
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group spinner">
                                            <input type="text" class="form-control" id="8" value="First Email (Mandatory)" readonly>
                                            <div class="input-group-btn-vertical">
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group spinner">
                                            <input type="text" class="form-control" id="9" value="Second Email (Optional)" readonly>
                                            <div class="input-group-btn-vertical">
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group spinner">
                                            <input type="text" class="form-control" id="10" value="Phone 1" readonly>
                                            <div class="input-group-btn-vertical">
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group spinner">
                                            <input type="text" class="form-control" id="11" value="Phone 2" readonly>
                                            <div class="input-group-btn-vertical">
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group spinner">
                                            <input type="text" class="form-control" id="12" value="Periodicity" readonly>
                                            <div class="input-group-btn-vertical">
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group spinner">
                                            <input type="text" class="form-control" id="13" value="Media" readonly>
                                            <div class="input-group-btn-vertical">
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group spinner">
                                            <input type="text" class="form-control" id="14" value="Tags" readonly>
                                            <div class="input-group-btn-vertical">
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td style="height: 100px">{{ $contact->firstname }}</td>
                                        <td>{{ $contact->surname }}</td>
                                        <td>{{ $contact->state_of_origin }}</td>
                                        <td>{{ $contact->sex }}</td>
                                        <td>{{ $contact->organization }}</td>
                                        <td>{{ $contact->function }}</td>
                                        <td>{{ $contact->current_city }}</td>
                                        <td>{{ $contact->current_state }}</td>
                                        <td>{{ $contact->email_1 }}</td>
                                        <td>{{ $contact->email_2 }}</td>
                                        <td>{{ $contact->telephone_1 }}</td>
                                        <td>{{ $contact->telephone_2 }}</td>
                                        <td>{{ $contact->periodicity }}</td>
                                        <td>{{ $contact->media }}</td>
                                        <td>{{ $contact->tags }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    @else
                        <div class="col-md-12">
                            <h3>No list to review or import</h3>
                            <a href="{{ '/contacts/import/upload' }}">Return</a>
                        </div>
                    @endif
                </div>
                <div role="tabpanel" class="tab-pane {{ ($option == 'main')?'active':'' }}">
                    <div class="progress">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="" id="progress">
                            <span id="progress-body"></span>
                        </div>
                    </div>
                    <div class="progress-info" style="margin-top: -15px">
                        <div class="col-md-4 alert-success" id="success"></div>
                        <div class="col-md-4 alert-danger" id="failed"></div>
                        <div class="col-md-4 alert-info" id="total"></div>
                    </div>

                    <div style="margin-top: 50px">
                        <span class="pull-left" style="font-size: 30px"><i class="fa fa-btn fa-cog"></i></span>
                        <span>
                            <b>Fix failed contacts in the next step.</b><br>
                            The info of a failed contact might be incomplete or it might conflict with the info of a contact already stored in Engage. It could also be due to internal server errors.
                        </span>

                        <span>{{ Session::get('headers')[13] }}</span>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane {{ ($option == 'review')?'active':'' }}">
                    <div class="col-lg-offset-1 col-md-10">
                        <?php
                            use App\ContactTemp;
                            use App\Contacts;

                            $failed = ContactTemp::where('user_id', '=', Auth::user()->id)->orderBy('number')->get();
                            $success = Contacts::whereFilter('Last imported')->orderBy('number')->get();
                        ?>
                        @if( $failed->count() == 0 )
                            <h3 style="margin-top: 0px">Contacts successfully imported</h3>
                        @else
                            <h3 style="margin-top: 0px">Some of your contacts could not be imported. Fix them now.</h3>
                        @endif
                        <ul class="nav nav-tabs" role="tablist" id="myTabs">
                            <li role="presentation" class="{{ ($failed->count() == 0)?'':'active' }}"><a href="#home" style="color: #be254c" aria-controls="home" role="tab" data-toggle="tab">
                                    <i class="fa fa-warning"></i> Imported failed ({{ $failed->count() }})</a>
                            </li>
                            <li role="presentation" class="{{ ($failed->count() == 0)?'active':'' }}"><a href="#profile" style="color: #85ff7d" aria-controls="profile" role="tab" data-toggle="tab">
                                    <i class="fa fa-check"></i> Imported ({{ $success->count() }})</a>
                            </li>
                        </ul>


                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane {{ ($failed->count() == 0)?'':'active' }}" id="home">
                                @if( $failed->count() == 0 )
                                    <h4>No errors observed</h4>
                                @else
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First name</th>
                                            <th>Surname</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($failed as $item)
                                            <tr>
                                                <td>{{ $item->number }}</td>
                                                <td>{{ $item->firstname }}</td>
                                                <td>{{ $item->surname }}</td>
                                                <td>{{ $item->email_1 }}</td>
                                                <td><a href=""><i class="fa fa-wrench" style="font-size: 10px"></i> fix</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                            <div role="tabpanel" class="tab-pane {{ ($failed->count() == 0)?'active':'' }}" id="profile">
                                @if( $success->count() == 0 )
                                    <h4>No record imported</h4>
                                @else
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First name</th>
                                            <th>Surname</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($success as $item)
                                            <tr>
                                                <td>{{ $item->number }}</td>
                                                <td>{{ $item->firstname }}</td>
                                                <td>{{ $item->surname }}</td>
                                                <td>{{ $item->email_1 }}</td>
                                                <td><a href="{{ '/contacts/view/'.$item->key }}"><i class="fa fa-eye" style="font-size: 10px"></i> view</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('js/setHeaders.js') }}"></script>
    <script src="{{ asset('js/import.js') }}"></script>
    <script type="text/javascript">
        $('#myTabs a').click(function (e) {
            e.preventDefault();
            $(this).tab('show')
        })
    </script>
@endsection