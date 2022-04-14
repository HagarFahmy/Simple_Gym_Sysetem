@extends('layouts.app')

@section('content')


    <h1>Gym Managers</h1>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Bordered Table</h3>
            <div class="box-tools">
                @can('create-gymManagers', 'admin')
                <a href="{{ route('dashboard.gym-managers.create') }}" class="btn btn-sm btn-success">Create</a>
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
                    <th>Gym</th>
                    <th style="width: 40px">Action</th>
                </tr>
                @foreach($gymManagers as $key => $gymManager)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $gymManager->name }}</td>
                        <td>
                            <img src="{{ $gymManager->image_path }}" alt="" width="50px">
                        </td>
                        <td>{{ $gymManager->email }}</td>
                        <td>{{ $gymManager->gym->name }}</td>
                        <td>
                            <div class="btn-group">
                                @can('update-gymManagers', 'admin')
                                    <a class="btn btn-sm btn-info" href="{{ route('dashboard.gym-managers.edit', $gymManager->id) }}">Edit</a>
                                @endcan
                                @can('destroy-gymManagers', 'admin')
                                    <form action="{{ route('dashboard.gym-managers.destroy', $gymManager->id) }}" method="POST">
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
