@extends("Jlib::layouts.dashboard")



@section("content")

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Plain Page</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                {{$scope}}
                {{$module}}
            </div>
        </div>
    </div>

@stop