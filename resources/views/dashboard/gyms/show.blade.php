@extends('layouts.app')
@section('content')
<div id="show">
<div class="box box-primary fs-5 text-center  ">
  <div class="box-header with-border">
    <h3 class="box-title"> Gym</h3>
  </div>
  <div class="text-center  ">
  <img src="{{ $gym->image_path }}" class="card-img-top " width="200rem">
    <ul class="list-group list-group-flush fs-5">
      <li class="list-group-item"><span> Gym Name :</span> {{$gym->name}}</li>
      <li class="list-group-item "><span> City : </span>{{$gym->city->name}}</li>
      <h3>city manager</h3>
      <li class="list-group-item "><span>Name : </span>  {{$gym->city_manager->name}}</li>
      <li class="list-group-item "> <span>Email : </span> {{$gym->city_manager->email}}</li>
      <h3>Gym managers</h3>
      @foreach($gym->gym_managers as $gym_manager)
      <li class="list-group-item "><span>Name : </span>  {{$gym_manager->name}}</li>
      <li class="list-group-item "><span>Email : </span>  {{$gym_manager->email}}</li>
      @endforeach
    </ul>
  </div>

  </div>

</div>
@endsection