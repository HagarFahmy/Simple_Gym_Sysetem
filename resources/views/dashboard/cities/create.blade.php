@extends('layouts.app')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Create City</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('dashboard.cities.store') }}" method="POST">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">City Name</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control"  value="{{ old('name') }}" id="name" placeholder="Name" name="name">
                        @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Create</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
@endsection
