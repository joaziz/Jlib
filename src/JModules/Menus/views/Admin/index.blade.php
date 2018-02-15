@extends("Jlib::layouts.dashboard")

@section('content')
    <div class="row">
        <div class="col-lg-12 ">
            <div class="panel">
                <div class="panel-header ">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>
                                <i class="fa fa-table"> </i>
                                <strong>{{__("admin.Filter")}} </strong>
                                {{__("admin.table")}}
                            </h3>
                        </div>

                    </div>

                </div>
                <div class="panel-header text-right">
                    <hr/>
                    <a href="{{url("/$scope/$module/create")}}"
                       class="btn btn-success">{{__("admin.create")." ".__("admin.$module")}}</a>
                    <hr/>
                </div>

                <div class="panel-content pagination2 table-responsive">
                    @if($rows->count())
                        <table class="table table-hover table-dynamic">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__("admin.name")}}</th><th>{{__("admin.link")}}</th><th>{{__("admin.icon")}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $rows  as $row)
                                <tr>
                                    <td>{{@$row->id}}</td>
                                    <td>{{@$row->name}}</td><td>{{@$row->link}}</td><td>{{@$row->icon}}</td>
                                    <td>

                                        <a href="{{"$scope/$module/$row->id/edit"}}"
                                           class="btn btn-primary btn-sm ">
                                            {{__("admin.edit")}}

                                        </a>


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div>
                            {!! $rows->links() !!}
                        </div>
                    @else
                        <div class="alert alert-warning">
                            {{__('admin.sorry there is no data for now.')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        function aproveRequest($id) {
            window.location.href = "<?= url("/{$scope}/{$module}/status?s=1&id=") ?>" + $id;
        }
    </script>
@stop