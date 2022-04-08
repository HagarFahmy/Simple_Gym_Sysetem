
@extends('layouts.app')
@section('content')

<div class="box box-primary  ">
  <div class="box-header with-border">
    <h3 class="box-title"> City Manager</h3>
  </div>
  <!-- /.box-header -->
  <img src="{{ $cityManager->image_path }}" style="width: 50px;" >

  <div class="text-center  ">
  <ul class="list-group list-group-flush fs-5">
    <li class="list-group-item ">{{$cityManager->name}}</li>
    <li class="list-group-item ">{{$cityManager->email}}</li>
    <li class="list-group-item ">{{$cityManager->city->name}}</li>
  </ul>
  </div>

</div>
@endsection