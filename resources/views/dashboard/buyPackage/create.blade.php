@extends('layouts.app')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">By Backage For User</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('dashboard.buy-package.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="gym_member" class="col-sm-2 control-label">Gym Member</label>

                    <div class="col-sm-10">
                        <select id="gym_member" class="form-control @error('gym_member') is-invalid @enderror"
                            name="gym_member" value="{{ old('gym_member') }}" required autocomplete="gym_member"
                            autofocus>
                            @foreach ($gymMembers as $gymMember)
                                <option value="{{ $gymMember->id }}">{{ $gymMember->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('gym_member')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="training_package" class="col-sm-2 control-label">Training Package</label>

                    <div class="col-sm-10">
                        <select id="training_package" class="form-control @error('training_package') is-invalid @enderror"
                            name="training_package" value="{{ old('training_package') }}" required
                            autocomplete="training_package" autofocus>
                            @foreach ($trainingPackages as $trainingPackage)
                                <option value="{{ $trainingPackage->id }}">
                                    {{ $trainingPackage->name }} -
                                    ${{ $trainingPackage->price / 100 }}
                                </option>
                            @endforeach
                        </select>
                        @error('training_package')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="gym" class="col-sm-2 control-label">Gym</label>

                    <div class="col-sm-10">
                        <select id="gym" class="form-control @error('gym') is-invalid @enderror" name="gym"
                            value="{{ old('gym') }}" required autocomplete="gym" autofocus>
                            @foreach ($gyms as $gym)
                                <option value="{{ $gym->id }}">{{ $gym->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('gym')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="box-footer">
                    <button type="reset" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>
            </div>
        </form>


    </div>
@endsection
