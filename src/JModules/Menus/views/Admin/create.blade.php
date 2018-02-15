@extends("layout.dashboard")

@section('Title', __("admin.create")." ".__("admin.$module"))

<?php

//dd(session()->all());

?>
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="panel">
        <div class="panel-header">
            <i class="icon-check"></i>
            <h2>{{__("admin.create")." ".__("admin.$module")}}</h2>
            <hr/>
        </div>
        <div class="panel-content">
            {!! Form::model($row,['url' => $scope.'/'.$module, 'method' => 'post','class'=>'form-horizontal style-form','enctype'=>'multipart/form-data'] ) !!}
            @include("$module::admin.form")
            {!! Form::submit(__('admin.Save') ,['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop