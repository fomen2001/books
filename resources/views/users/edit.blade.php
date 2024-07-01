@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-lg-12">
                <h2 class="d-inline-block">Edit User</h2>
                <a class="btn btn-primary float-end" href="{{ route('users.index') }}">Back</a>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="name"><strong>Name:</strong></label>
                        <input type="text" id="name" value="{{ $user->name }}" name="name" class="form-control"
                            placeholder="Name">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="email"><strong>Email:</strong></label>
                        <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control"
                            placeholder="Email">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="password"><strong>Password:</strong></label>
                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="Password">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="confirm-password"><strong>Confirm Password:</strong></label>
                        <input type="password" id="confirm-password" name="confirm-password" class="form-control"
                            placeholder="Confirm Password">
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="roles"><strong>Role:</strong></label>
                        <select id="roles" class="form-control" multiple name="roles[]">
                            @foreach ($roles as $role)
                                <option value="{{ $role }}" @if(in_array($role, $userRole)) selected @endif>{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
