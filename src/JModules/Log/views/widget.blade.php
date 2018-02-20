@if(@$logs&&is_array($logs)&&!empty($logs))

    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Access Log
                    <small>Recently Logs with data</small>
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <table class="table table-striped table-responsive">

                    <tbody>
                    @foreach($logs as $log)
                        <tr>

                            @foreach($log as $val)
                                @if(is_string($val) )
                                    <td>{{@($val)}}</td>
                                @else
                                    <?php $_itm = json_encode($val) ?>
                                    <td>{{@($_itm=="null")?"":$_itm}}</td>
                                @endif
                            @endforeach

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a class="pull-right label label-default" href="{{url("$JLibScope/logs")}}">All Logs</a>

            </div>
        </div>
    </div>
@endif