@extends("Jlib::layouts.dashboard")

@section('Title', _t("admin.$module"))

@section('content')
    <div class="row">
        <div class="col-lg-12 ">
            <div class="panel">
                <div class="panel-header ">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>
                                <i class="fa fa-table"> </i>
                                <strong>{{_t("admin.Filter")}} </strong>
                                {{_t("admin.table")}}
                            </h3>
                        </div>

                    </div>

                </div>
                <div class="panel-header text-right">
                    <hr/>
                    <a href="{{"/$scope/$module/create"}}"
                       class="btn btn-success">{{_t("admin.create")." "._t("admin.$module")}}</a>
                    <hr/>
                </div>

                <div class="panel-content pagination2 table-responsive">
                @if($rows->count())
                        <table class="table table-hover table-dynamic">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{_t("admin.title")}}</th><th>{{_t("admin.content")}}</th><th>{{_t("admin.slug")}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $rows  as $row)
                                <tr>
                                    <td>{{@$row->id}}</td>
                                    <td>{{@$row->title}}</td><td>{{@$row->content}}</td><td>{{@$row->slug}}</td>
                                    <td>
                                        <a href="{{"$scope/$module/$row->id/edit"}}"
                                           class="btn btn-primary btn-sm ">
                                            {{_t("admin.edit")}}
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
                            {{_t('admin.sorry there is no data for now.')}}
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