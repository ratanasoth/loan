@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-heading bg-primary">
                 <span class="panel-title">
                    <strong>Edit Branch</strong>
                </span>
                </div>
                <div class="panel-body pn">
                    @if(Session::has('sms'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{session('sms')}}
                        </div>
                    @endif
                    <div class="row">
                        <form action="{{url('/branch/update')}}" class="form-horizontal" method="post" name="frm" id="frm" enctype="multipart/form-data">
                            <div class="col-sm-6">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$branches->id}}">
                                    <div class="form-group">
                                        <label for="code" class="control-label col-sm-4">Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="code" id="code"
                                                   autofocus required value="{{$branches->code}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="control-label col-sm-4">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="name" id="name" required value="{{$branches->name}}">
                                        </div>
                                    </div>
                                   <div class="form-group">
                                    <label for="company" class="control-label col-sm-4">Company ID</label>
                                    <div class="col-sm-8">
                                        <select name="company" id="company" class="form-control">
                                             @foreach($companies as $com)
                                                <option value="{{$com->id}}" {{$branches->company_id==$com->id?"selected":""}}>{{$com->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4">&nbsp;</label>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-primary btn-flat">Save</button>
                                        <a href="{{url('/branch')}}" class="btn btn-danger btn-flat">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection