@extends('layouts.app')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Coach</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('dashboard.coaches.update', $coach->id) }}" method="POST" >
            @csrf
            @method('put')
            <div class="box-body">

                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control"  value="{{ $coach->name }}" id="name" placeholder="Name" name="name">
                        @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    <label for="gym" class="col-sm-2 control-label">Gym</label>

                    <div class="col-sm-10">

                        <select name="gym_id" class="form-control" id="gym">
                            <option value="{{ $coach->gym->id }}" selected>{{ $coach->gym->name }}</option>
                            @foreach($gyms as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('gym_id'))
                            <span class="text-danger">{{ $errors->first('gym_id') }}</span>
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
