@extends('layouts.app')

@section('content')


    <h1>City Managers</h1>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Bordered Table</h3>
            <div class="box-tools">
                @can('create-cityManagers', 'admin')
                <a href="{{ route('dashboard.city-managers.create') }}" class="btn btn-sm btn-success">Create</a>
                @endcan
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Email</th>
                    <th>City</th>
                    <th style="width: 40px">Action</th>
                </tr>
                @foreach($cityManagers as $key => $cityManager)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $cityManager->name }}</td>
                        <td>
                            <img src="{{ $cityManager->image_path }}" alt="" width="50px">
                        </td>
                        <td>{{ $cityManager->email }}</td>
                        <td>{{ $cityManager->city->name }}</td>
                        <td>
                            <div class="btn-group">
                                @can('update-cityManagers', 'admin')
                                    <a class="btn btn-sm btn-info" href="{{ route('dashboard.city-managers.edit', $cityManager->id) }}">Edit</a>
                                @endcan
                                @can('destroy-cityManagers', 'admin')
                                    <form action="{{ route('dashboard.city-managers.destroy', $cityManager->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody></table>
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
