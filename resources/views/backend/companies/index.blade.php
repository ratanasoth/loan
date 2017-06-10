@extends('layouts.app')
@section('content')
    <div class="panel">
        <div class="panel-heading bg-primary">
        <span class="panel-title">
           <strong>បញ្ជីឈ្មោះ ក្រុមហ៊ុន</strong>
        </span>
        </div>
        <div class="panel-body pn">
        <table class="table table-condensed table-bordered">
            <thead>
            <tr>
                <th><a href="{{url('/company/create')}}"><i class="fa fa-plus-circle text-primary" title="បន្ថែមថ្មី"></i></a> ល.រ</th>
                <th>លេខកូដ</th>
                <th>ឈ្មោះ</th>
                <th>អ៊ីម៉ែល</th>
                <th>លេខទូរស័ព្ទ</th>
                <th>គេហទំព័រ</th>
                <th>និមិត្តសញ្ញា</th>
                <th>សកម្មភាព</th>
            </tr>
            </thead>
            <tbody>
            @php($i=1)
                @foreach($companies as $company)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$company->code}}</td>
                        <td><a href="{{url('/company/detail/'.$company->id)}}" class="btn btn-link">{{$company->name}}</a></td>
                        <td>{{$company->email}}</td>
                        <td>{{$company->phone}}</td>
                        <td>{{$company->website}}</td>
                        <td><img src="{{asset('/img/'.$company->logo)}}" alt="Logo" width="42"></td>
                        <td>
                            <a href="{{url('/company/edit/'.$company->id)}}" title="កែប្រែ"><i class="fa fa-edit text-success"></i></a> &nbsp;&nbsp;
                            <a href="{{url('/company/delete/'.$company->id)}}" title="លុប" onclick="return confirm('តើអ្នកពិតជាចង់លុបមែនទេ?')"><i class="fa fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        </div>
    </div>

@endsection
