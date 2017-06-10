@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading bg-primary">
                 <span class="panel-title">
                    <strong>បង្កើតឃុំ/សង្កាត់</strong>
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
                        <form action="{{url('/commune/update')}}" class="form-horizontal" method="post" name="ufrm" id="ufrm">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$communes->id}}">
                            <div class="form-group">
                                <label for="province" class="control-label col-sm-4">ខេត្ត/ក្រុង</label>
                                <div class="col-sm-8">
                                    <select name="province" id="province" class="form-control">
                                        @foreach($provinces as $pro)
                                            <option value="{{$pro->id}}"
                                            @if($pro->id==$communes->province_id) selected='selected' @endif 
                                            >{{$pro->name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="province_name" id="province_name" value="{{$communes->province_name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="district" class="control-label col-sm-4">ស្រុក/ខណ្ឌ</label>
                                <div class="col-sm-8">
                                    <select name="district" id="district" class="form-control">

                                    </select>
                                    <input type="hidden" name="district_name" id="district_name" value="{{$communes->district_name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="code" class="control-label col-sm-4">លេខកូដ</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="code" id="code" autofocus required value="{{$communes->code}}" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="control-label col-sm-4">ឈ្មោះឃុំ/សង្កាត់</label>
                                <div class="col-sm-8">
                                    <input 
                                        type="text" 
                                        class="form-control"
                                        name="name" 
                                        id="name" 
                                        value="{{$communes->name}}" required
                                    >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">&nbsp;</label>
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-primary btn-flat">រក្សាទុក</button>
                                    <a href="{{url('/commune')}}" class="btn btn-danger btn-flat">បោះបង់</a>
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
@section('js')
    <script>
        $(document).ready(function () {
            getDistrict();
            // filter district on province change
            $("#province").change(function () {
                getDistrict();
            });
            $("#ufrm").submit(function (event) {
                event.preventDefault();
                var pname = $("#province :selected").text();
                $("#province_name").val(pname);
                var dname = $("#district :selected").text();
                $("#district_name").val(dname);
                ufrm.submit();
            });
        });
        // function to get district
        function getDistrict()
        {
            // get district
            $.ajax({
                type: "GET",
                url: burl + "/district/get/" + $("#province").val(),
                success: function (data) {
                    var opts = "";
                    for(var i=0; i<data.length; i++)
                    {
                        opts +="<option value='" + data[i].id + "'>" + data[i].name + "</option>";
                    }
                    $("#district").html(opts);
                    $("#district").val("{{$communes->district_id}}");
                }
            });
        }

    </script>
@endsection