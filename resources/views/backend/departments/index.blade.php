@extends('layouts.app')
@section('content')
    <div class="panel">
        <div class="panel-heading bg-primary">
        <span class="panel-title">
           <strong>Department List</strong>
        </span>
        </div>
        <div class="panel-body pn">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>
                        <a href="{{url('/department/create')}}"><i class="fa fa-plus-circle text-primary" title="Add new"></i></a>&nbsp;&nbsp;ID
                    </th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($departments as $dp)
                    <tr>
                        <td>{{$dp->id}}</td>
                        <td>{{$dp->code}}</td>
                        <td>{{$dp->name}}</td>
                        <td>
                            <a href="{{url('/department/edit/'.$dp->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a> &nbsp;&nbsp;
                            <a href="{{url('/department/delete/'.$dp->id)}}" title="Delete" onclick="return confirm('Do you want to delete?')"><i class="fa fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection