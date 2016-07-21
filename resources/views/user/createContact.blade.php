
<?php
$viewData = [
        'page' => 'contacts',
        'pageTitle' => 'Create Contact | Engage',
]
?>
@extends('layouts.userMaster')
@section('content')



    <div class="container page-body">
        <div class="row">
            <h2 class="body-h2">Add new contact</h2>
            <h3 style="margin-top: 10px;margin-bottom: 40px" class="body-h3">Enter the info of a stakeholder or influencer</h3>
            @if (count($errors) > 0)
                <div class="alert alert-warning">
                    There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            @if(Session::has('message'))
                <div class="alert alert-success">
                    <ul style="list-style: none">
                        <li>{{ Session::get('message') }}</li>
                    </ul>
                </div>
            @endif

            {!! Form::open(['url' => '/contacts/create', 'class' => 'form-inline']) !!}

            <div class="col-md-12">
                <h4 class="body-h2">Tags</h4>
                <!-- Tags Form Input -->
                <div id="prefetch" class="form-group large-width {{ $errors->has('tags')? 'has-error' : '' }}">
                    <ul id="term" style="border: solid 1px #00CAFB">

                    </ul>
                    {{--<ul style="border: solid #00CAFB 1px; padding-left: 10px" id="term"></ul>--}}
                    {{--{!! Form::text('tags', null, ['id' => 'term', 'class' => 'form-control', 'placeholder' => 'Find or add a tag', 'dadta-role' => 'tagsinput' ]) !!}--}}
                    <span class="help-block" style="font-size: 10px">Examples: (coder bursary marketers). Separate with comma or enter key. Max of 7 tags</span>
                </div>
                <hr>
            </div>
            <div class="col-lg-8 contact-form">
                <div class="col-md-12">
                    <h4 class="body-h2">Personal details</h4>
                </div>
                <div class="col-md-6">
                    <!-- FirstName Form Input -->
                    <div class="form-group {{ $errors->has('firstName')? 'has-error' : '' }}">
                        {!! Form::text('firstName', null, ['class' => 'form-control', 'placeholder' => 'First name']) !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Surname Form Input -->
                    <div class="form-group {{ $errors->has('surname')? 'has-error' : '' }}">
                        {!! Form::text('surname', null, ['class' => 'form-control', 'placeholder' => 'Surname'])  !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('state_of_origin')? 'has-error' : '' }}">
                        <select id="basic" class="form-control selectpicker show-tick" data-live-search="true" name="state_of_origin">
                            <option>
                                <?php
                                if(old('state_of_origin') == ''){
                                    echo 'State of origin';
                                }else{
                                    echo old('state_of_origin');
                                }
                                ?>
                            </option>
                            @foreach($states as $state)
                                <option>{{ $state->state }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="padding-top: 35px">
                        <label class="radio-inline">
                            <input <?php if(old('sex') == 'male') echo 'checked'?> type="radio" name="sex" value="male"> Male
                        </label>
                        <label class="radio-inline">
                            <input <?php if(old('sex') == 'female') echo 'checked'?> type="radio" name="sex" value="female"> Female
                        </label><br>
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Function Form Input -->
                    <div class="form-group {{ $errors->has('organization')? 'has-error' : '' }}">
                        {!! Form::text('organization', null, ['id' => 'org', 'class' => 'form-control', 'placeholder' => 'Add or find organization'])  !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Function Form Input -->
                    <div class="form-group {{ $errors->has('function')? 'has-error' : '' }}">
                        {!! Form::text('function', null, ['class' => 'form-control', 'placeholder' => 'Specify function or rank'])  !!}
                    </div>
                </div>


                <div class="col-md-6">
                    <!-- Current_city Form Input -->
                    <div class="form-group {{ $errors->has('current_city')? 'has-error' : '' }}">
                        {!! Form::text('current_city', null, ['class' => 'form-control', 'placeholder' => 'Current City'])  !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('current_state')? 'has-error' : '' }}">
                        <select id="basic" class="form-control selectpicker show-tick" data-live-search="true" name="current_state">
                            <option>
                                <?php
                                if(old('current_state') == ''){
                                    echo 'Current State';
                                }else{
                                    echo old('current_state');
                                }
                                ?>
                            </option>
                            @foreach($states as $state)
                                <option>{{ $state->state }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <hr class="col-md-12">

                <h4 class="body-h2">Contact details</h4>
                <div class="col-md-6">
                    <!-- Email_1 Form Input -->
                    <div class="form-group {{ $errors->has('email_1')? 'has-error' : '' }}">
                        {!! Form::text('email_1', null, ['class' => 'form-control', 'placeholder' => 'Email'])  !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Email_2 Form Input -->
                    <div class="form-group {{ $errors->has('email_2')? 'has-error' : '' }}">
                        {!! Form::text('email_2', null, ['class' => 'form-control', 'placeholder' => 'Second email (optional)'])  !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Phone_1 Form Input -->
                    <div class="form-group {{ $errors->has('phone_1')? 'has-error' : '' }}">
                        {!! Form::text('phone_1', null, ['class' => 'form-control', 'placeholder' => 'Telephone'])  !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Phone_2 Form Input -->
                    <div class="form-group {{ $errors->has('phone_2')? 'has-error' : '' }}">
                        {!! Form::text('phone_2', null, ['class' => 'form-control', 'placeholder' => 'Telephone 2 (optional)'])  !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h4 class="body-h2">Periodicity</h4>
                <div class="form-group {{ $errors->has('periodicity')? 'has-error' : '' }}">
                    <select id="basic" class="form-control selectpicker show-tick" data-live-search="true" name="periodicity">
                        <option>
                            <?php
                                if(old('periodicity') == ''){
                                    echo 'Weekly';
                                }else{
                                    echo old('periodicity');
                                }
                            ?>
                        </option>
                        <option>Daily</option>
                        <option>Monthly</option>
                        <option>Annually</option>
                    </select>
                </div>
                <hr>
                <h4 class="body-h2">Media</h4>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="Web" name="media[0]"> Web
                    </label><br>
                    <label>
                        <input type="checkbox" value="Tv" name="media[1]"> Tv
                    </label><br>
                    <label>
                        <input type="checkbox" value="Radio" name="media[2]"> Radio
                    </label><br>
                    <label>
                        <input type="checkbox" value="Print" name="media[3]"> Print
                    </label><br>
                    <label>
                        <input type="checkbox" value="Blog" name="media[4]"> Blog
                    </label><br>
                </div>
            </div>
            <br style="clear: both">
            <hr>
            <div class="col-md-12" style="margin-bottom: 20px">
                <div class="col-lg-8">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary pull-right']) !!}
                </div>
                <div class="col-lg-1" style="padding-top: 10px">
                    <span class="pull-right">and</span>
                </div>
                <div class="col-lg-3">
                    <select id="basic" class="form-control selectpicker show-tick" data-live-search="true" name="next">
                        <option>Insert a new contact</option>
                        <option>Return to contact page</option>
                    </select>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/tag-it.js') }}"></script>
    <script src="{{ asset('js/autocomplete.js') }}"></script>
    <script>
        $(function(){
            $('#term').tagit({
                autocomplete: ({
                    source: function (request, response) {
                        $.ajax({
                            url: "http://engage.dev/contacts/autocomplete",
                            data: {format: "json", term: request.term},
                            dataType: 'json',
                            type: 'GET',
                            success: function (data) {
                                response($.map(data, function (item) {
                                    console.log(item);
                                    return {
                                        label: item.name,
                                        value: item.value
                                    }
                                }));
                            },
                            error: function (request, status, error) {
                                console.log(error);
                            }
                        })
                    },
                    minLength: 1
                }),
                allowSpaces: true,
                singleField: true
            });
        });
    </script>

    <script>
        $(function(){
            $('#org').autocomplete({
                source:     "http://engage.dev/contacts/organization",
                minLength:  2,
                select:     function(event, ui){
                    $('#org').val(ui.item.value);
                }
            });
        });
    </script>
@endsection
