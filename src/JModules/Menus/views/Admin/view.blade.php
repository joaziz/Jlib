@extends("layout.dashboard")

@section('Title', $module)

@section('content')

    <div class="content__header">
        <h2>Add New {{Applexicon\Utilitis\Str\Str::singular($module)}}</h2>

    </div>


    <div class="card">
        <div class="card__header">
            <h2>All info about {{Applexicon\Utilitis\Str\Str::singular($module)}} </h2>
        </div>

        <div class="card__body">
            <table class="table">
                <tbody>
                <tr>
                    <td width="50%" style="text-align: right"><strong>name</strong></td>
                    <td width="50%" style="text-align: left">{{$row->name}}</td>
                </tr><tr>
                    <td width="50%" style="text-align: right"><strong>link</strong></td>
                    <td width="50%" style="text-align: left">{{$row->link}}</td>
                </tr><tr>
                    <td width="50%" style="text-align: right"><strong>icon</strong></td>
                    <td width="50%" style="text-align: left">{{$row->icon}}</td>
                </tr><tr>
                    <td width="50%" style="text-align: right"><strong>parent_id</strong></td>
                    <td width="50%" style="text-align: left">{{$row->parent_id}}</td>
                </tr><tr>
                    <td width="50%" style="text-align: right"><strong>order</strong></td>
                    <td width="50%" style="text-align: left">{{$row->order}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop