
@extends('layouts.app')
@section('content')

<div class="box box-primary  ">
  <div class="box-header with-border">
    <h3 class="box-title"> Gym Manager</h3>
  </div>
  <!-- /.box-header -->
  <img src="{{ $GymManager->image_path }}" style="width: 50px;" >

  <div class="text-center  ">
  <ul class="list-group list-group-flush fs-5">
    <li class="list-group-item ">{{$GymManager->name}}</li>
    <li class="list-group-item ">{{$GymManager->email}}</li>
    <li class="list-group-item ">{{$GymManager->city->name}}</li>
  </ul>
  </div>

</div>
@endsection