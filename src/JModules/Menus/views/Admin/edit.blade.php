@extends("layout.dashboard")

@section('Title', __("admin.edit")." ".__("admin.$module"))

@section('content')

    <div class="panel">
        <div class="panel-header">
            <i class="icon-check"></i>

            <h2>{{__("admin.edit")." ".__("admin.$module")}}</h2>
            <hr/>
        </div>
        <div class="panel-content">
            {!! Form::model($row,['url' => $scope.'/'.$module.'/'.$row->id, 'method' => 'post','class'=>'form-horizontal style-form','enctype'=>'multipart/form-data'] ) !!}
            {{ method_field('PUT') }}
            {!! Form::hidden("id",$row->id) !!}

            @include($scope.'.'.$module.'.form')

            <hr/>
            {!! Form::submit(__('admin.Save') ,['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@stop