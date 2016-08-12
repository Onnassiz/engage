
<?php
$viewData = [
        'page' => 'contacts',
        'pageTitle' => 'Import & export | Engage',
]
?>
@extends('layouts.userMaster')
@section('content')


    <div class="container page-body">
        <h2 class="body-h2">Import & export contacts</h2>
        <h3 style="margin-top: 10px" class="body-h3">Import and export your contacts the way you want it.</h3>
        <hr class="intro-divider">
        <div class="col-md-6">
            <div style="margin-top: 30px;color: rgba(0, 0, 0, 0.6);">
                <a href="{{ '/contacts/import/upload' }}" class="import-link">
                    <div style="margin-top: 20px; margin-bottom: 20px">
                        <span class="pull-left" style="font-size: 30px"><i class="fa fa-btn fa-upload"></i></span>
                        <span>
                            <b>Import from a csv or Excel file</b><br>
                            You can import large contacts saved in a excel file or a csv file.
                        </span>
                    </div>
                </a>
                <hr class="intro-divider">
                <a href="{{ '/contacts/export' }}" class="import-link">
                    <div style="margin-top: 20px">
                        <span class="pull-left" style="font-size: 30px"><i class="fa fa-btn fa-download"></i></span>
                        <span>
                            <b>Export to an Excel file</b><br>
                            You can export your contacts to an excel file, Modify them and re-import to out contacts database.
                        </span>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-offset-1 col-md-5">
            <div class="alert alert-info" style="margin-top: 40px">
                You may have difficulties importing your contact list. You can download and review the
                <a href="{{ '/contacts/importFileExample' }}" class="alert-link">example contact list</a>
                to ensure it matches your list format.
            </div>
        </div>
    </div>
@endsection
