@extends('layouts.app')
@section('content')
<div id="show">
  <div class="box box-primary text-center ">
    <div class="box-header with-border">
      <h3 class="box-title"> City Manager</h3>
    </div>
    <!-- /.box-header -->
    <img src="{{ $cityManager->image_path }}">
    <div class="text-center  ">
      <ul class="list-group list-group-flush fs-5">
        <li class="list-group-item "><span>Name :</span>{{$cityManager->name}}</li>
        <li class="list-group-item "><span>Email :</span>{{$cityManager->email}}</li>
        <li class="list-group-item "><span>City :</span>{{$cityManager->city->name}}</li>
      </ul>
    </div>

  </div>
</div>
@endsection