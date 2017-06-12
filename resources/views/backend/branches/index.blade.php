@extends('layouts.app')
@section('content')
    <?php $lang = Auth::user()->language .".php"; ?>
    <?php include(app_path()."/lang/". $lang); ?>
    <div class="panel">
        <div class="panel-heading bg-primary">
        <span class="panel-title">
           <strong><?php echo $branch_list ?></strong>
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
                        {{$id}}
                    </th>
                    <th>{{$code}}</th>
                    <th>{{$name}}</th>
                    <th>{{$company}}</th>
                    <th>{{$action}}</th>
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
                            <a href="{{url('/branch/delete/'.$bra->id)}}" title="លុប" onclick="return confirm('{{$delete_confirm}}')"><i class="fa fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection