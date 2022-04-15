@extends('layouts.app')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Training Package</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{route('dashboard.training-packages.update', $package->id)}}" method="POST">
            @csrf
            @method('put')
            <div class="box-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  value="{{$package->name}}" id="name" placeholder="Name" name="name">
                        @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  value="{{ $package->price}}" id="price" placeholder="Price" name="price">
                        @if($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="sessions_number" class="col-sm-2 control-label">Sessions Number</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  value="{{ $package->sessions_number }}" id="sessions_number" placeholder="Sessions Number" name="sessions_number">
                        @if($errors->has('sessions_number'))
                            <span class="text-danger">{{ $errors->first('sessions_number') }}</span>
                        @endif
                    </div>
                </div>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <p>{{ $error}}</

                    @endforeach
                @endif
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

