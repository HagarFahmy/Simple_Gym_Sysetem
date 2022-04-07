@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')


    <h1>{{$permissionGroup}}</h1>

    <div class="box">
        <div class="box-header with-border">
            <div class="box-tools">
                @can('create-' . $permissionGroup, 'admin')
                    <a href="{{ route('dashboard.' . $module . '.create') }}" class="btn btn-sm btn-success">Create</a>
                @endcan
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            {!! $dataTable->table() !!}
        </div>
        <!-- /.box-body -->
    </div>


@endsection
@section('scripts')
    <script src="{{ asset('dashboard/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    {!! $dataTable->scripts() !!}
@endsection
