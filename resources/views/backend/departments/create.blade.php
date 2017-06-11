@extends('layouts.app')
@section('content')
    <?php $lang = Auth::user()->language .".php"; ?>
    <?php include(app_path()."/lang/". $lang); ?>
    <div class="panel">
        <div class="panel-heading bg-primary">
        <span class="panel-title">
           <strong>{{$new_department}}</strong>
        </span>
        </div>
        <div class="panel-body pn">
        </div>
    </div>
@endsection