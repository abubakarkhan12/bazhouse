@extends('layouts.app')

@section('content')
  <div class="dashboard_content_wrapper  property-page bgc-f7">
    <div class="dashboard dashboard_wrapper pr30 pr0-xl">
    <div class="dashboard__main pl0-md">
    <div class="row ">
        <div class="col-md-12">
            {{ Form::open(['route' => 'settings.update', 'files'=>true])}}
            <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                <div class="card-header bg-transparent"><h2 class="mb-0">General Settings</h2></div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-xl-4">
                                <div class="mb20">
                                    {{Form::label('company_name', 'Company Name', ['class' => 'heading-color ff-heading fw600 mb10'])}}
                                    {{ Form::text('company_name', setting('company_name'), ['class'=>"form-control"])}}
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="mb20">
                                    {{Form::label('company_email', 'Company Email', ['class' => 'heading-color ff-heading fw600 mb10'])}}
                                    {{ Form::text('company_email', setting('company_email'), ['class'=>"form-control"])}}
                                </div>
                            </div>
                        
                            <div class="col-sm-6 col-xl-4">
                                <div class="mb20">
                                    {{Form::label('company_phone', 'Company Phone', ['class' => 'heading-color ff-heading fw600 mb10'])}}
                                    {{ Form::text('company_phone', setting('company_phone'), ['class'=>"form-control"])}}
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="mb20">
                                    {{Form::label('company_address', 'Company Address', ['class' => 'heading-color ff-heading fw600 mb10'])}}
                                    {{ Form::text('company_address', setting('company_address'), ['class'=>"form-control"])}}
                                </div>
                            </div>
                       
                            <div class="col-sm-6 col-xl-4">
                                <div class="mb20">
                                    {{Form::label('company_city', 'City', ['class' => 'heading-color ff-heading fw600 mb10'])}}
                                    {{ Form::text('company_city', setting('company_city'), ['class'=>"form-control"])}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                {{Form::label('company_logo', 'Company Logo', ['class' => 'heading-color ff-heading fw600 mb10'])}}
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                          <a id="uploadFile" data-input="thumbnail" data-preview="holder" class="ud-btn btn-white2 mb30">
                                             Choose Logo<i class="fal fa-arrow-right-long"></i>
                                          </a>
                                        </span>
                                        @if (setting('company_logo'))
                                            <input id="thumbnail" class="form-control d-none" type="text" value="{{ setting('company_logo') }}" name="company_logo">
                                        @else
                                            <input id="thumbnail" class="form-control d-none" type="text" name="company_logo">
                                        @endif
                                    </div>
                            </div>
                            <div class="col-md-2 text-right">
                                @if (setting('company_logo'))
                                <img alt="Image placeholder"
                                    class="avatar avatar-xl  rounded-circle"
                                    data-toggle="tooltip" data-original-title="{{ setting('company_name') }} Logo"
                                    src="{{ asset(setting('company_logo')) }}">
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
            <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                <div class="card-header bg-transparent"><h4 class="title fz17 mb30">Display Settings</h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-xl-4">
                            <div class="mb20">
                                {{Form::label('record_per_page', 'Record Per Page', ['class' => 'heading-color ff-heading fw600 mb10'])}}
                                {{ Form::text('record_per_page', setting('record_per_page'), ['class'=>"form-control"])}}
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-4">
                            <div class="mb20">
                                {{Form::label('company_currency_symbol', 'Currency Symbol', ['class' => 'heading-color ff-heading fw600 mb10'])}}
                                {{ Form::text('company_currency_symbol', setting('company_currency_symbol'), ['class'=>"form-control"])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                <div class="card-header bg-transparent"><h4 class="mb-0">Other Settings</h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-xl-4">
                            {{ Form::label('default_role', 'User Registeration Admin Notification Email', ['class' => 'heading-color ff-heading fw600 mb10']) }}
                            <div class="custom-control custom-checkbox">
                                {!! Form::hidden('register_notification_email', 0) !!}
                                <input type="checkbox" name="register_notification_email" value="1" {{ setting('register_notification_email') ? 'checked' : ''}} class="custom-control-input" id="register_notification_email">
                                {{ Form::label('register_notification_email', 'Activate', ['class' => 'custom-control-label heading-color ff-heading fw600 mb10']) }}
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb20">
                                {{ Form::label('default_role', 'Select default register role', ['class' => 'heading-color ff-heading fw600 mb10']) }}
                                {{ Form::select('default_role', $roles, setting('default_role', null), [ 'class'=> 'selectpicker form-control', 'placeholder' => 'Select role...']) }}
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-4">
                            <div class="mb20">
                                {{Form::label('max_login_attempts', 'Maximum invaild login attempts', ['class' => 'heading-color ff-heading fw600 mb10'])}}
                                {{ Form::text('max_login_attempts', setting('max_login_attempts'), ['class'=>"form-control"])}}
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-4">
                            <div class="mb20">
                                {{Form::label('lockout_delay', 'Lockout delay (minutes)', ['class' => 'heading-color ff-heading fw600 mb10'])}}
                                {{ Form::text('lockout_delay', setting('lockout_delay'), ['class'=>"form-control"])}}
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            {!! Form::submit('Update Settings', ['class'=> 'ud-btn btn-dark']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {{Form::close()}}

        </div>
    </div>
    </div>
    </div>
    </div>
    
@endsection
@push('scripts')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        jQuery(document).ready(function(){
            jQuery('#uploadFile').filemanager('file');
        })
    </script>
@endpush
