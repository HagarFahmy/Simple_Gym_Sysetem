
@extends('layouts.app')
@section('content')
    <div id="show">
        <div class="box box-primary fs-5 text-center  ">
            <div class="box-header with-border">
                <h3 class="box-title"> Training Packages</h3>
            </div>
            <div class="text-center  ">
                <ul class="list-group list-group-flush fs-5">
                    <li class="list-group-item"> <span>Training Packages Name :</span> {{$package->name}}</li>
                    <li class="list-group-item "> <span>Price:</span>{{$package->price}}</li>
                    <li class="list-group-item "> <span>Sessions Number:</span>{{$package->sessions_number}}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
