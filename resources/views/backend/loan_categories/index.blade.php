@extends('layouts.app')
@section('content')
    <?php $lang = Auth::user()->language .".php"; ?>
    <?php include(app_path()."/lang/". $lang); ?>
    <div class="panel">
        <div class="panel-heading bg-primary">
        <span class="panel-title">
           <strong>{{$loan_category_list}}</strong>
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
                        <a href="{{url('/loancategory/create')}}">
                            <i 
                                class="fa fa-plus-circle text-primary" 
                                title="បន្ថែមថ្មី"
                            > 
                            </i>
                        </a>&nbsp;&nbsp;
                        {{$id}}
                    </th>
                    <th>{{$code}}</th>
                    <th>{{$description}}</th>
                    <th>{{$khmer_description}}</th>
                    <th>{{$action}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($loan_categories as $cat)
                    <tr>
                        <td>{{App\Models\Utility::toKh($cat->id)}}</td>
                        <td>{{$cat->code}}</td>
                        <td>{{$cat->description}}</td>
                        <td>{{$cat->khmer_description}}</td>
                        <td>
                            <a href="{{url('/loancategory/edit/'.$cat->id)}}" title="កែប្រែ"><i class="fa fa-edit text-success"></i></a> &nbsp;&nbsp;
                            <a href="{{url('/loancategory/delete/'.$cat->id)}}" title="លុប" onclick="return confirm('{{$delete_confirm}}')"><i class="fa fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $loan_categories->appends(Input::except('page'))->links() !!}
        </div>
    </div>
@endsection