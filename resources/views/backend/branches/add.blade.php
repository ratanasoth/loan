@extends('layouts.app')
@section('content')
    <?php $lang = Auth::user()->language .".php"; ?>
    <?php include(app_path()."/lang/". $lang); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-heading bg-primary">
                 <span class="panel-title">
                    <strong>{{$new_branch}}</strong>
                </span>
                </div>
                <div class="panel-body pn">
                    @if(Session::has('sms'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{session('sms')}}
                        </div>
                    @endif
                    @if(Session::has('sms1'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{session('sms1')}}
                        </div>
                    @endif
                    <div class="row">
                        <form action="{{url('/branch/save')}}" class="form-horizontal" method="post" name="frm" id="frm" enctype="multipart/form-data">
                        <div class="col-sm-6">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="code" class="control-label col-sm-4">{{$code}}</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="code" id="code"
                                               autofocus required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="control-label col-sm-4">{{$name}}</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="name" id="name" required>
                                    </div>
                                </div>
                               <div class="form-group">
                                <label for="company" class="control-label col-sm-4">{{$company}}</label>
                                <div class="col-sm-8">
                                    <select name="company" id="company" class="form-control">
                                        @foreach($companies as $com)
                                            <option value="{{$com->id}}">{{$com->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                    
                                <div class="form-group">
                                    <label class="control-label col-sm-4">&nbsp;</label>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-primary btn-flat">{{$save}}</button>
                                        <a href="{{url('/branch')}}" class="btn btn-danger btn-flat">{{$cancel}}</a>
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