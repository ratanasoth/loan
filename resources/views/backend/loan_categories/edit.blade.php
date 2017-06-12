@extends('layouts.app')
@section('content')
    <?php $lang = Auth::user()->language .".php"; ?>
    <?php include(app_path()."/lang/". $lang); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-heading bg-primary">
                 <span class="panel-title">
                    <strong>{{$edit_loan_category}}</strong>
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
                        <form action="{{url('/loancategory/update')}}" class="form-horizontal" method="post" name="frm" id="frm" enctype="multipart/form-data">
                        <div class="col-sm-6">
                                {{ csrf_field() }}
                                <input type="hidden" id="id" name="id" value="{{$loan_categories->id}}">
                                <div class="form-group">
                                    <label for="code" class="control-label col-sm-4">{{$code}}</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="code" id="code"
                                               autofocus required value="{{$loan_categories->code}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="control-label col-sm-4">{{$description}}</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="description" id="description" required value="{{$loan_categories->description}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="control-label col-sm-4">{{$khmer_description}}</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="khmer_description" id="khmer_description" required value="{{$loan_categories->khmer_description}}">
                                    </div>
                                </div>
                    
                                <div class="form-group">
                                    <label class="control-label col-sm-4">&nbsp;</label>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-primary btn-flat">{{$save_change}}</button>
                                        <a href="{{url('/loancategory')}}" class="btn btn-danger btn-flat">{{$cancel}}</a>
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