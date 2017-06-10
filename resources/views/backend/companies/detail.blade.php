@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-heading bg-primary">
                 <span class="panel-title">
                    <strong>ពត៌មានលម្អិតរបស់ក្រុមហ៊ុន</strong>
                </span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form action="#" class="form-horizontal" onsubmit="return false">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="#" class="control-label col-sm-3">លេខកូដ</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" disabled value="{{$company->code}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="#" class="control-label col-sm-3">ឈ្មោះក្រុមហ៊ុន</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" disabled value="{{$company->name}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="#" class="control-label col-sm-3">ទូរស័ព្ទ</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" disabled value="{{$company->phone}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="#" class="control-label col-sm-3">អ៊ីម៉ែល</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" disabled value="{{$company->email}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="#" class="control-label col-sm-3">គេហទំព័រ</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" disabled value="{{$company->website}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="#" class="control-label col-sm-3">អាស័យដ្ឋាន</label>
                                    <div class="col-sm-8">
                                        <textarea cols="30" rows="5" class="form-control" disabled>{{$company->address}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <p>
                                    <img src="{{asset('img/'.$company->logo)}}" alt="Logo" width="180">
                                </p>
                                <p>
                                    <a href="#" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">ប្តូរនិមិត្តសញ្ញា</a>
                                </p>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">ជ្រើសរើសនិមិត្តសញ្ញា</h4>
                </div>
                <div class="modal-body">
                    <form action="#" class="form-horizontal" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="logo" class="control-label col-sm-3">និមិត្តសញ្ញា</label>
                            <div class="col-sm-7">
                                <input type="file" class="form-control" name="logo" accept="image/*" onchange="loadFile(event)">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="logo" class="control-label col-sm-3">&nbsp;</label>
                            <div class="col-sm-7">
                                <img src="" alt=""  id="preview">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">ចាកចេញ</button>
                    <button type="button" class="btn btn-primary btn-flat">រក្សាទុក</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function loadFile(e){
            var output = document.getElementById('preview');
            output.width = 170;
            output.src = URL.createObjectURL(e.target.files[0]);
        }
    </script>
@endsection