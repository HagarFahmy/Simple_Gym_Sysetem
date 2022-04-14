@extends('layouts.app')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit City Manager</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('dashboard.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control"  value="{{ $user->name }}" id="name" placeholder="Name" name="name">
                        @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                        <input type="email" class="form-control"  value="{{ $user->email }}" id="email" placeholder="Email" name="email">
                        @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10">
                        <input type="password" class="form-control"  id="password" placeholder="Password" name="password">
                        @if($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="col-sm-2 control-label">Password Confirmation</label>

                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password_confirmation" placeholder="Password Confirmation" name="password_confirmation">
                        @if($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>
                </div>

                
                <div class="form-group">
                    <label for="gender" class="col-sm-2 control-label">Gender</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control"  value="{{ $user->gender }}" id="gender" placeholder="Gender" name="gender">
                        @if($errors->has('gender'))
                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="date_of_birth" class="col-sm-2 control-label">Date of birth</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control"  value="{{ $user->date_of_birth }}" id="date_of_birth" placeholder="Date of birth" name="date_of_birth">
                        @if($errors->has('date_of_birth'))
                            <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="gym" class="col-sm-2 control-label">Gym</label>

                    <div class="col-sm-10">

                        <select name="gym_id" class="form-control" id="gym">
                            <option value="{{ $user->gym->id }}" selected>{{ $user->gym->name }}</option>
                            @foreach($gyms as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('gym_id'))
                            <span class="text-danger">{{ $errors->first('gym_id') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="profile_image" class="col-sm-2 control-label">Profile Image</label>

                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="profile_image"  name="profile_image">
                        @if($errors->has('profile_image'))
                            <span class="text-danger">{{ $errors->first('profile_image') }}</span>
                        @endif
                    </div>
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
