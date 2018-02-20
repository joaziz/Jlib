@extends("Jlib::layouts.dashboard")



@section("content")

    <div class="row">
        @includeIf("log::widget",["logs"=>$logs])
    </div>
@stop