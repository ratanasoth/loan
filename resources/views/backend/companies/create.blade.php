@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-heading bg-primary">
                 <span class="panel-title">
                    <strong>បង្កើតក្រុមហ៊ុនថ្មី</strong>
                </span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form action="{{url('/company/save')}}" class="form-horizontal" method="post" name="frm" id="frm" enctype="multipart/form-data">
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
                        <div class="col-sm-6">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="code" class="control-label col-sm-4">លេខកូដ</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="code" id="code"
                                               autofocus required value="{{old('code')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="control-label col-sm-4">ឈ្មោះក្រុមហ៊ុន</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="name" id="name" required value="{{old('name')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="control-label col-sm-4">អ៊ីម៉ែល</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" name="email" id="email" required value="{{old('email')}}" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="website" class="control-label col-sm-4">គេហទំព័រ</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="website" id="website" value="{{old('website')}}" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="control-label col-sm-4">លេខទូរស័ព្ទ</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="phone" id="phone" value="{{old('phone')}}" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4">&nbsp;</label>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-primary btn-flat">រក្សាទុក</button>
                                        <a href="{{url('/company')}}" class="btn btn-danger btn-flat">បោះបង់</a>
                                    </div>
                                </div>
                        </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="address" class="control-label col-sm-3">អាស័យដ្ឋាន</label>
                                    <div class="col-sm-8">
                                        <textarea name="address" id="address" cols="30" rows="4" class="form-control">{{old('address')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="logo" class="control-label col-sm-3">និមិត្តសញ្ញា</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="logo" id="logo" class="form-control">
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