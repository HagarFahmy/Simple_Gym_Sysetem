@extends('layouts.app')

@section('content')


    <h1>Training Packages</h1>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Bordered Table</h3>
            <div class="box-tools">
{{--                @can('create-cityManagers', 'admin')--}}
                    <a href="{{ route('dashboard.training-packages.create') }}" class="btn btn-sm btn-success">Create</a>
{{--                @endcan--}}
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Sessions number</th>
                    <th>Created at</th>
                    <th>Deleted at</th>
                    <th style="width: 40px">Action</th>
                </tr>
                @foreach($packages as  $package)
                    <tr>
                        <td>{{ $package->id }}</td>
                        <td>{{$package->name}}</td>
                        <td>{{ $package->price }}</td>
                        <td>{{ $package->sessions_number }}</td>
                        <td>
                            <div class="btn-group">
                                    <a class="btn btn-sm btn-info" href="">Edit</a>
                                    <form action="" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
        </div>
    </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
            </ul>
        </div>
@endsection
