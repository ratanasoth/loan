@extends('layouts.app')
@section('content')
    <div class="panel">
        <div class="panel-heading bg-primary">
        <span class="panel-title">
           <strong>List Branches</strong>
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
                        <a href="{{url('/branch/create')}}">
                            <i 
                                class="fa fa-plus-circle text-primary" 
                                title="បន្ថែមថ្មី"
                            > 
                            </i>
                        </a>
                        ID
                    </th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Company ID</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($branches as $bra)
                    <tr>
                        <td>{{App\Models\Utility::toKh($bra->id)}}</td>
                        <td>{{$bra->code}}</td>
                        <td>{{$bra->name}}</td>
                        <td>{{$bra->company}}</td>
                        <td>
                            <a href="{{url('/branch/edit/'.$bra->id)}}" title="កែប្រែ"><i class="fa fa-edit text-success"></i></a> &nbsp;&nbsp;
                            <a href="{{url('/branch/delete/'.$bra->id)}}" title="លុប" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection