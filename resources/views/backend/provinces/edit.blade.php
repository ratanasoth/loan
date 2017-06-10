@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-heading bg-primary">
                 <span class="panel-title">
                    <strong>កែប្រែខេត្តក្រុង</strong>
                </span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            @if(Session::has('sms'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    {{session('sms')}}
                                </div>
                            @endif
                            <form action="{{url('/province/update')}}" class="form-horizontal" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$province->id}}">
                                <div class="form-group">
                                    <label for="name" class="control-label col-sm-4">លេខកូដ</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="code" id="code" autofocus required value="{{$province->code}}" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="control-label col-sm-4">ឈ្មោះខេត្ត/ក្រុង</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$province->name}}" name="name" id="name" autofocus required >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4">&nbsp;</label>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-primary btn-flat">រក្សាទុក</button>
                                        <a href="{{url('/province')}}" class="btn btn-danger btn-flat">បោះបង់</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection