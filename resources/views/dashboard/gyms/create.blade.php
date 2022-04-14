@extends('layouts.app')

@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Create Gym</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{ route('dashboard.gyms.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="box-body">


            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ old('name') }}" id="name" placeholder="Name" name="name">
                    @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">City Managers</label>

                <div class="col-sm-10">

                    <select name="city_manager_id" class="form-control" id="cityManager">
                        @foreach($cityManagers as $cityManager)
                        <option value="{{ $cityManager->id }}" {{ old('city_manager_id') == $cityManager->id  ? 'selected' : '' }}>{{ $cityManager->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('city_manager_id'))
                    <span class="text-danger">{{ $errors->first('city_manager_id') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                    <label for="cover_image" class="col-sm-2 control-label">Image</label>

                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="password" name="cover_image">
                        @if($errors->has('cover_image'))
                        <span class="text-danger">{{ $errors->first('cover_image') }}</span>
                        @endif
                    </div>
                </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Create</button>
            </div>
            <!-- /.box-footer -->
    </form>
</div>
@endsection