@extends('layouts.app')

@section('content')
    <div class="row justify-content-center" style=" display: flex ; margin-top:150px">

        <div class="" style="background-color: rgb(214, 210, 210) ; border-radius: 10px ; margin: 10px; width:350px ;">

            <div class="small-box  info text-white">
                <div class="inner">
                    @role('Super Admin')
                        <h4 class="">Total Revenue</h4>
                    @endrole
                    @role('City Manager')
                        <h4 class="">Total Revenue For Your City</h4>
                    @endrole
                    @role('Gym Manager')
                        <h4 class="">Total Revenue For Your Gym</h4>
                    @endrole
                    <h3>${{ $totalRevenue / 100 }}</h3>

                </div>
                <div class="icon">
                    <i class="fa-solid fa-dollar-sign" style="font-size:60px"></i>
                </div>

            </div>
        </div>
        <div class="" style="background-color: rgb(214, 210, 210) ; border-radius: 10px ; margin: 10px ; width:350px">

            <div class="small-box info  text-white">
                <div class="inner">
                    @role('Super Admin')
                        <h4>Total Revenue Last Month</h4>
                    @endrole
                    @role('City Manager')
                        <h4>Total Revenue Last Month For Your City </h4>
                    @endrole
                    @role('Gym Manager')
                        <h4>Total Revenue Last Month For Your Gym</h4>
                    @endrole
                    <h3>${{ $totalRevenueLastMonth / 100 }}</h3>

                </div>
                <div class="icon">
                    <i class="fa-solid fa-dollar-sign" style="font-size:60px"></i>
                </div>

            </div>
        </div>

        <div class="" style="background-color: rgb(214, 210, 210) ; border-radius: 10px ; margin: 10px ;  width:350px">

            <div class="small-box info text-white">
                <div class="inner">
                    @role('Super Admin')
                        <h4 class="">Total Revenue Last Year</h4>
                    @endrole
                    @role('City Manager')
                        <h4 class="">Total Revenue Last Year For Your City</h4>
                    @endrole
                    @role('Gym Manager')
                        <h4 class="">Total Revenue Last Year For Your Gym</h4>
                    @endrole
                    <h3>${{ $totalRevenueLastYear / 100 }}</h3>

                </div>
                <div class="icon">
                    <i class="fa-solid fa-dollar-sign" style="font-size:60px"></i>
                </div>

            </div>
        </div>
    @endsection
