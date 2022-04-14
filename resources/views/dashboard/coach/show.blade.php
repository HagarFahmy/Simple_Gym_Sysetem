@extends('layouts.app')

@section('content')
<div id="show">
  <div class="card mx-auto text-center" style="width:50rem; margin:2rem auto;">
    <div class="card-body">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <h3>Coach</h3>
        </li>
        <li class="list-group-item"><span>Name :</span>{{$coach->name}}</li>
        <li class="list-group-item"><span>Gym Name :</span>{{$coach->gym->name}}</li>
        <li class="list-group-item">
          <h3>Training Sessions</h3>
        </li>
        @foreach($coach->training_sessions as $training_session)
        <li class="list-group-item"><span>Name : </span>{{$training_session->name}}</li>
        @endforeach
      </ul>

    </div>
  </div>
</div>
@endsection