@extends('layouts.app')

@section('content')

<div  >
<section class="content home d-flex align-items-center" >
    <div class="container ">
        <div class="row ">
            <div class="content " >
                <div style="background-color: antiquewhite ; width: 600px ; height:100px; padding-top:15px ; border-radius: 5px ; margin-left:240px ; margin-top:100px ">
                <h1 class="text-center h-home  pt-5 fw-bold welcome ">Welcome {{ Auth::user()->name }}</h1>
            </div>
                {{-- <h1 class="text-center h-home mb-5  text-white">Ready to Burn ??</h1> --}}
            </div>
        </div>
    </div>
</section>
</div>
@endsection
