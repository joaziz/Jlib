@extends("Jlib::layouts.dashboard")

@section("css")
    <style>
        .uiList {
            list-style: none;

        }

        .portlet-header {
            text-align: center;
            cursor: pointer;
        }

        .sortable2 {
            min-height: 20px;
            /*background: rgba(0, 0, 255, 0.24);*/
        }

        .ui-state-highlight {
            background: rgba(0, 0, 0, .05);
            height: 50px;
            border: dashed thin rgba(0, 0, 0, 0.32);
        }

        .item > div:not(.item-details) {
            margin-top: 5px;
            padding: 1px 11px;
            background: #eaeaea;
            border: thin dashed #c3c3c3;
        }

        .item .txt {
            display: inline-block;
            padding-left: 10px;
        }

        .newItem {
            opacity: .7;
            cursor: pointer;
        }
        .sm-input{
            width: 233px;
            padding: 7px;
            outline: none;
            border-radius: 8px;
            margin: 5px;
            border: thin solid #00000040;
        }
        .item-details label{
            display: block;
            margin-left: 10px;
        }
    </style>
@stop

@section('content')
    <div class="col-lg-12" xmlns="">
        <div class="col-lg-5">
            <div class="x_panel">
                <div class="x_title">
                    <h3>Menu Maker</h3>
                </div>
                <div class="x_content">
                    <button id="saveMenu" class="btn btn-success pull-right">Save</button>
                    <div class="clearfix"></div>
                    <hr/>
                    <ul class="uiList sortable2 mainMenu"></ul>
                </div>
            </div>
        </div>
    </div>
@stop
@section("js")
    <script src="vendor/Jlib/js/Menu/Resourses.js"></script>
    <script src="vendor/Jlib/js/Menu/MenuInit.js"></script>
    <script>


    </script>
@stop