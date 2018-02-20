@extends("Jlib::layouts.dashboard")

@section('Title',_t("admin.$module"))

@section('content')

    <div class="content__header">
        <h2>{{_t("admin.Add New ".Applexicon\Utilitis\Str\Str::singular($module)}}"</h2>

    </div>


    <div class="card">
        <div class="card__header">
            <h2>{{_t("admin.All info about ".Applexicon\Utilitis\Str\Str::singular($module)}}</h2>
        </div>

        <div class="card__body">
            <table class="table">
                <tbody>
                <tr>
                    <td width="50%" style="text-align: right"><strong>{{_t("admin.title")}}</strong></td>
                    <td width="50%" style="text-align: left">{{$row->title}}</td>
                </tr><tr>
                    <td width="50%" style="text-align: right"><strong>{{_t("admin.content")}}</strong></td>
                    <td width="50%" style="text-align: left">{{$row->content}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop