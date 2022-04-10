@extends('layouts.app')
@section('content')

<div class="box box-primary fs-5  ">
  <div class="box-header with-border">
    <h3 class="box-title"> Gym</h3>
  </div>
  <!-- /.box-header -->
  <img src="{{ $gym->image_path }}" class="card-img-top w-50">
  <div class="text-center  ">
    <ul class="list-group list-group-flush fs-5">
    <h3>Gym</h3>
      <li class="list-group-item "> Gym Name : {{$gym->name}}</li>
      <li class="list-group-item "> City : {{$city_manager->city->name}}</li>
      <h3>city manager</h3>
      <li class="list-group-item ">Name  {{$city_manager->name}}</li>
      <li class="list-group-item "> Email {{$city_manager->email}}</li>
    </ul>
  </div>



</div>
@endsection