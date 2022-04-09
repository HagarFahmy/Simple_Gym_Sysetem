
@extends('layouts.app')
@section('content')

<div class="box box-primary  ">
  <div class="box-header with-border">
    <h3 class="box-title"> User</h3>
  </div>
  <!-- /.box-header -->
  <img src="{{ $user->image_path }}" style="width: 50px;" >

  <div class="text-center  ">
  <ul class="list-group list-group-flush fs-5">
    <li class="list-group-item ">{{$user->name}}</li>
    <li class="list-group-item ">{{$user->email}}</li>
    <li class="list-group-item ">{{$user->gender}}</li>
    <li class="list-group-item ">{{$user->date_of_birth}}</li>
    <li class="list-group-item ">{{$user->gym->name}}</li>
  </ul>
  </div>

</div>
@endsection