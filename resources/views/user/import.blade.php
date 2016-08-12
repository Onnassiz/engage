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
                <li role="presentation" class="{{ ($option == 'upload')?'active':'' }}""><a href="{{ '/contacts/import/upload' }}">Add Contact File</a></li>
                <li role="presentation" class="{{ ($option == 'match')?'active':'' }}""><a href="#">Match Fields</a></li>
                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Import</a></li>
                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Review</a></li>
            </ul>

            
            <!-- Tab panes -->
            <div class="tab-content" style="color: rgba(0, 0, 0, 0.6);">
                <div role="tabpanel" class="tab-pane {{ ($option == 'upload')?'active':'' }}" id="home">
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
                    <div style="width: 100%; overflow: auto">
                        <table class="table table-bordered" style="table-layout: fixed;width: 3500px">
                            <tr class="thead">
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
                            <tr class="thead">
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
                            <tr class="thead">
                                <td>
                                    <select class="selectpicker" name="1">
                                        <option value="One">You</option>
                                        <option value="One">You</option>
                                        <option value="One">You</option>
                                        <option value="One">You</option>
                                    </select>
                                </td>
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
                            @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->firstname }}</td>
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
                </div>
                <div role="tabpanel" class="tab-pane" id="messages">...</div>
                <div role="tabpanel" class="tab-pane" id="settings">...</div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/bootstrap-select.js') }}"></script>
@endsection