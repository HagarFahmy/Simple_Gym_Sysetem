@extends('layouts.app')

@section('content')
<div class=" ">
<div class="card mx-auto" style="width: 22rem; margin:2rem auto;">
  <img src="{{'images/admins/'.$cityManager->image}}" class="card-img-top">
  <div class="card-body">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{$cityManager->name}}</li>
    <li class="list-group-item">{{$cityManager->email}}</li>
    <li class="list-group-item">{{$cityManager->city->name}}</li>
  </ul>

  </div>
</div>
</div>
@endsection
