
@extends('layouts.app')
@section('content')
<div id="show">
<div class="box box-primary   ">
  <div class="box-header with-border">
    <h3 class="box-title">{{$user->name}}</h3>
  </div>
  <!-- /.box-header -->
  <img src="{{ $user->image_path }}" >

  <div class="text-center  ">
  <ul class="list-group list-group-flush fs-5">
    <li class="list-group-item "><span>Email : </span>{{$user->email}}</li>
    <li class="list-group-item "><span>Gender : </span>{{$user->gender}}</li>
    <li class="list-group-item "><span>Date Of Birth :</span>{{$user->date_of_birth}}</li>
    <li class="list-group-item "><span>Gym Name : </span>{{$user->gym->name}}</li>
    <li><h3>Training Sessions</h3></li>
    @foreach($user->training_sessions as $training_session)
    <li>{{$training_session->name}}</li>
    @endforeach
  </ul>
  </div>

</div>
</div>
@endsection