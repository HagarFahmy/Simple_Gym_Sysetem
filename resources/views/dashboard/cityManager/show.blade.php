@extends('layouts.app')

@section('content')
<div class=" ">
<div class="card mx-auto" style="width: 18rem;">
  <img src="{{$cityManager->image}}" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">{{$cityManager->name}}</h5>
    <p class="card-text">{{$cityManager->email}}</p>
    <a href="#" class="btn btn-primary">back</a>
  </div>
</div>
</div>
@endsection
