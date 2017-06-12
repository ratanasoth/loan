@extends('layouts.app')
@section('content')
    <?php $lang = Auth::user()->language .".php"; ?>
    <?php include(app_path()."/lang/". $lang); ?>
    <div class="panel">
        <div class="panel-heading bg-primary">
        <span class="panel-title">
           <strong>{{$position_list}}</strong>
        </span>
        </div>
        <div class="panel-body pn">
            @if(Session::has('sms'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{session('sms')}}
                </div>
            @endif
            <table class="table table-hover table-bordered" id="tblUser">
                <thead>
                <tr>
                    <th>
                        <a href="{{url('/position/create')}}"><i class="fa fa-plus-circle text-primary"></i></a>&nbsp;&nbsp;
                    {{$id}}</th>
                    <th>{{$code}}</th>
                    <th>{{$name}}</th>
                    <th>{{$action}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($positions as $pos)
                    <tr>
                        <td>{{App\Models\Utility::toKh($pos->id)}}</td>
                        <td>{{$pos->code}}</td>
                        <td>{{$pos->name}}</td>
                        <td>
                            <a href="{{url('/position/edit/'.$pos->id)}}" title="កែប្រែ"><i class="fa fa-edit text-success"></i></a> &nbsp;&nbsp;
                            <a href="{{url('/position/delete/'.$pos->id)}}" title="លុប" onclick="return confirm('{{$delete_confirm}}')"><i class="fa fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection