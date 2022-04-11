@extends('layouts.app')

@section('content')
<div class=" ">
<div class="card mx-auto" style="width: 22rem; margin:2rem auto;">
  <div class="card-body">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{$coach->name}}</li>
    <li class="list-group-item">{{$coach->gym->name}}</li>
    <h3>Training Sessions</h3>
    @foreach($coach->training_sessions as $training_session)
    <li class="list-group-item">{{$training_session->name}}</li>
    @endforeach
  </ul>

  </div>
</div>
</div>
@endsection
