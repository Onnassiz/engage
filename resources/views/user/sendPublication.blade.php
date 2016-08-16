
<?php
$viewData = [
        'page' => 'publications',
        'pageTitle' => 'Send | Engage',
]
?>
@extends('layouts.userMaster')
@section('content')


    <div class="container page-body">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                Send Publication
                <span class="pull-right">Recipient(s) <a href="{{ '/publications/filter' }}">{{ count($contacts) }} contact(s)</a></span>
            </div>
            <div class="panel-body">
                <div class="col-lg-offset-1 col-md-10">
                    {!! Form::open(['url' => '/publications/send']) !!}


                    <div class="form-group {{ $errors->has('title')? 'has-error' : '' }}">
                        {!! Form::label('title','Title:',['class' => 'bold']) !!}
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter the title of your publication', 'style' => 'width: 100%'])  !!}
                        {!! $errors->first('title','<span class="help-block">:message</span>') !!}
                    </div>

                    <!-- Publication Form Input -->
                    <div class="form-group {{ $errors->has('publication')? 'has-error' : '' }}">
                        {!! Form::label('publication','Publication:',['class' => 'bold']) !!}
                        <textarea class="ckeditor" name="publication" id="pubs" rows="10" cols="80">
                            <?php if(!old('publication') == '') echo old('publication')?>
                        </textarea>

                        {!! $errors->first('publication','<span class="help-block">:message</span>') !!}
                    </div>


                    {!! Form::submit('Send', ['class' => 'btn btn-default pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'publication', {
            toolbarLocation: 'bottom'
        });
    </script>
@endsection
