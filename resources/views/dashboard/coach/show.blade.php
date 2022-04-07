@extends('layouts.app')

@section('content')
<div class=" ">
<div class="card mx-auto" style="width: 22rem; margin:2rem auto;">
  <div class="card-body">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{$coach->name}}</li>
    <li class="list-group-item">{{$coach->gym->name}}</li>
  </ul>

  </div>
</div>
</div>
@endsection
