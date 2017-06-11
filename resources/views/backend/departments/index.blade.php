@extends('layouts.app')
@section('content')
    <?php $lang = Auth::user()->language .".php"; ?>
    <?php include(app_path()."/lang/". $lang); ?>
    <div class="panel">
        <div class="panel-heading bg-primary">
        <span class="panel-title">
           <strong><?php echo $department_list ?></strong>
        </span>
        </div>
        <div class="panel-body pn">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>
                        <a href="{{url('/department/create')}}"><i class="fa fa-plus-circle text-primary" title="Add new"></i></a>&nbsp;&nbsp;{{$id}}
                    </th>
                    <th>{{$code}}</th>
                    <th>{{$name}}</th>
                    <th>{{$action}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($departments as $dp)
                    <tr>
                        <td>{{$dp->id}}</td>
                        <td>{{$dp->code}}</td>
                        <td>{{$dp->name}}</td>
                        <td>
                            <a href="{{url('/department/edit/'.$dp->id)}}" title="{{$edit}}"><i class="fa fa-edit text-success"></i></a> &nbsp;&nbsp;
                            <a href="{{url('/department/delete/'.$dp->id)}}" title="{{$delete}}" onclick="return confirm('{{$delete_confirm}}')"><i class="fa fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection