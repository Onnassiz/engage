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
                <li role="presentation" class="{{ ($option == 'first')?'active':'' }}""><a href="{{ '/contacts/import' }}">Add Contact File</a></li>
                <li role="presentation" class="{{ ($option == 'second')?'active':'' }}""><a href="#">Match Fields</a></li>
                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Import</a></li>
                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Review</a></li>
            </ul>

            
            <!-- Tab panes -->
            <div class="tab-content" style="color: rgba(0, 0, 0, 0.6);">
                <div role="tabpanel" class="tab-pane {{ ($option == 'first')?'active':'' }}" id="home">
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
                <div role="tabpanel" class="tab-pane {{ ($option == 'second')?'active':'' }}" id="profile">...</div>
                <div role="tabpanel" class="tab-pane" id="messages">...</div>
                <div role="tabpanel" class="tab-pane" id="settings">...</div>
            </div>

        </div>
    </div>
@endsection
