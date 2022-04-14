@extends('layouts.app')
@section('content')
<div id="show">
<div class="box box-primary fs-5 text-center  ">
  <div class="box-header with-border">
    <h3 class="box-title"> Training Session</h3>
  </div>
  <div class="text-center  ">
    <ul class="list-group list-group-flush fs-5">
      <li class="list-group-item"> <span>Training Session Name :</span> {{$trainingSession->name}}</li>
      <li class="list-group-item "> <span>Start At  : </span>{{$trainingSession->starts_at}}</li>
      <li class="list-group-item "> <span>Finsh At : </span>  : {{$trainingSession->finishes_at}}</li>
      <h3>Gym</h3>
      <li class="list-group-item "><span>Gym Name : </span>{{$trainingSession->gym->name}}</li>
      <h3>Coaches</h3>
      @foreach($trainingSession->coaches as $coache)
      <li class="list-group-item "> {{$coache->name}}</li>
      @endforeach
      <h3>Users</h3>
      <li class="list-group-item "> <span>Number OF Users : </span> {{$trainingSession->users->count()}}</li>
    </ul>
  </div>

  </div>

</div>
@endsection