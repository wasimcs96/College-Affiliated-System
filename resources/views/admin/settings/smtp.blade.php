@extends('layouts.admin.master')

@section('title', 'Settings')
@section('content')
@include('layouts.admin.flash.alert')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Manage Setting
                <small>Update SMTP configuration details</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('setting.general')}}">Settings</a></li>
                <li><a href="javascript:void(0)" class="active">SMTP</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-8">
                    <div class="box box-default settings">
                        <div class="box-header with-border">
                            <h3 class="box-title">SMTP Detail</h3>
                        </div><!-- /.box-header -->
                        <form method="post"  accept-charset="utf-8" role="form"
                              action="{{route('setting.smtp.update')}}">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Constant/Slug<span class="text-danger"></span></label>
                                            {{Form::text('setting[0][slug]','SMTP_ALLOW',['class' => 'form-control','readonly' => 'readonly'])}}
                                            {{Form::hidden('setting[0][title]','SMTP ALLOW',['class' => 'form-control'])}}
                                            {{Form::hidden('setting[0][field_type]','text',['class' => 'form-control'])}}
                                            {{Form::hidden('setting[0][manager]','smtp',['class' => 'form-control'])}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="smtp_allow">Config Value</label>
                                            <div class="form-group field-switch-type">
                                                <label class="css-input switch switch-sm switch-primary">
                                                    {{Form::hidden('setting[0][config_value]',0)}}
                                                    {{Form::checkbox('setting[0][config_value]',1,(isset($smtp[0]['config_value']) && $smtp[0]['config_value'] == 1) ? true : false,['class' => 'switch-status','id' => 'smtp_allow'])}}

                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Constant/Slug<span class="text-danger"></span></label>
                                            {{Form::text('setting[1][slug]','SMTP_EMAIL_HOST',['class' => 'form-control','readonly' => 'readonly'])}}
                                            {{Form::hidden('setting[1][title]','Email Host Name',['class' => 'form-control'])}}
                                            {{Form::hidden('setting[1][field_type]','text',['class' => 'form-control'])}}
                                            {{Form::hidden('setting[1][manager]','smtp',['class' => 'form-control'])}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="smtp-host-config">Config Value</label>
                                            {{Form::text('setting[1][config_value]',isset($smtp[1]['config_value']) ? $smtp[1]['config_value']: '' ,['class' => 'form-control','placeholder' => 'SMTP server Host','id' => 'smtp-host-config'])}}
                                        </div>
                                    </div>
                                </div><!-- /.row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Constant/Slug<span class="text-danger"></span></label>
                                            {{Form::text('setting[2][slug]','SMTP_USERNAME',['class' => 'form-control','readonly' => 'readonly'])}}
                                            {{Form::hidden('setting[2][title]','SMTP Username',['class' => 'form-control'])}}
                                            {{Form::hidden('setting[2][field_type]','text',['class' => 'form-control'])}}
                                            {{Form::hidden('setting[2][manager]','smtp',['class' => 'form-control'])}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Config Value</label>
                                            {{Form::text('setting[2][config_value]',isset($smtp[2]['config_value']) ? $smtp[2]['config_value']: '',['class' => 'form-control','placeholder' => 'SMTP Username'])}}
                                        </div>
                                    </div>
                                </div><!-- /.row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Constant/Slug<span class="text-danger"></span></label>
                                            {{Form::text('setting[3][slug]','SMTP_PASSWORD',['class' => 'form-control','readonly' => 'readonly'])}}
                                            {{Form::hidden('setting[3][title]','SMTP password',['class' => 'form-control'])}}
                                            {{Form::hidden('setting[3][field_type]','text',['class' => 'form-control'])}}
                                            {{Form::hidden('setting[3][manager]','smtp',['class' => 'form-control'])}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Config Value</label>
                                            {{Form::text('setting[3][config_value]',isset($smtp[3]['config_value']) ? $smtp[3]['config_value']: '',['class' => 'form-control','placeholder' => 'SMTP Password'])}}
                                        </div>
                                    </div>
                                </div><!-- /.row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Constant/Slug<span class="text-danger"></span></label>
                                            {{Form::text('setting[4][slug]','SMTP_PORT',['class' => 'form-control','readonly' => 'readonly'])}}
                                            {{Form::hidden('setting[4][title]','SMTP port',['class' => 'form-control'])}}
                                            {{Form::hidden('setting[4][field_type]','text',['class' => 'form-control'])}}
                                            {{Form::hidden('setting[4][manager]','smtp',['class' => 'form-control'])}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Config Value</label>
                                            {{Form::text('setting[4][config_value]',isset($smtp[4]['config_value']) ? $smtp[4]['config_value']: '',['class' => 'form-control','placeholder' => 'SMTP Port'])}}
                                        </div>
                                    </div>
                                </div><!-- /.row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Constant/Slug<span class="text-danger"></span></label>
                                            {{Form::text('setting[5][slug]','SMTP_TLS',['class' => 'form-control','readonly' => 'readonly'])}}
                                            {{Form::hidden('setting[5][title]','SMTP Tls',['class' => 'form-control'])}}
                                            {{Form::hidden('setting[5][field_type]','text',['class' => 'form-control'])}}
                                            {{Form::hidden('setting[5][manager]','smtp',['class' => 'form-control'])}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="5-config-value">Config Value</label>
                                            <div class="form-group field-switch-type">
                                                <label class="css-input switch switch-sm switch-primary">
                                                    {{Form::hidden('setting[5][config_value]',0)}}
                                                    {{Form::checkbox('setting[5][config_value]',1,(isset($smtp[5]['config_value']) && $smtp[5]['config_value'] == 1) ? true : false,['class' => 'switch-status'])}}
                                                    <span></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div><!-- /.row -->
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button class="btn btn-primary btn-flat" title="Submit" type="submit"><i
                                            class="fa fa-fw fa-save"></i> Submit
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                <i class="fa fa-exclamation"></i> Important Rules
                            </h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <p>
                                For each config settings that would be added to the system, make sure it has these constant/slug:
                            </p>
                            <ul>
                                <li>
                                    <small class="label bg-yellow">
                                        SMTP_ALLOW
                                    </small> - Will be replaced by SMTP allow flag from the admin settings.
                                </li>
                                <li>
                                    <small class="label bg-yellow">
                                        SMTP_EMAIL_HOST
                                    </small> - Will be replaced by SMTP email host from the admin settings.
                                </li>
                                <li>
                                    <small class="label bg-yellow">
                                        SMTP_USERNAME
                                    </small> - Will be replaced by SMTP username from the admin settings.
                                </li>
                                <li>
                                    <small class="label bg-yellow">
                                        SMTP_PASSWORD
                                    </small> - Will be replaced by SMTP Password from the admin settings.
                                </li>
                                <li>
                                    <small class="label bg-yellow">
                                        SMTP_PORT
                                    </small> - Will be replaced by SMTP Port from admin settings.
                                </li>
                                <li>
                                    <small class="label bg-yellow">
                                        SMTP_TLS
                                    </small> - Will be replaced by SMTP tls from admin settings.
                                </li>

                            </ul>
                        </div><!-- ./box-body -->
                    </div>
                </div>
            </div>
            </div>
        </section>
@stop
