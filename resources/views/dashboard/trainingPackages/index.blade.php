@extends('layouts.app')

@section('content')


    <h1>Training Packages</h1>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <div class="box-tools">
                @can('create-trainingPackages', 'admin')
                    <a href="{{ route('dashboard.training-packages.create') }}" class="btn btn-sm btn-success">Create</a>
                @endcan
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Session number</th>
                        <th>Created</th>
                        <th style="width: 250px">Action</th>
                    </tr>
                </thead>
                @foreach($packages as $key => $package)
                    <tbody>
                        <tr>
                            <td>{{$package->id}}</td>
                            <td>{{$package->name }}</td>
                            <td>{{$package->price/100}}$</td>
                            <td>{{$package->sessions_number}}</td>
                            <td>{{$package->created_at}}</td>
                            <td>
                                <div class="btn-group">
                                    @can('update-trainingPackages', 'admin')
                                        <a class="btn  btn-info" href="{{ route('dashboard.training-packages.edit', $package->id) }}">Edit</a>
                                    @endcan
                                        @can('list-trainingPackages', 'admin')
                                            <a class="btn btn-info " style="margin-left: 20px" href="{{ route('dashboard.training-packages.show', $package->id) }}">show</a>
                                        @endcan
                                    @can('destroy-trainingPackages', 'admin')
                                        <form style="display: inline-block; margin-left: 20px" action="{{ route('dashboard.training-packages.destroy', $package->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
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
    </div>


@endsection
