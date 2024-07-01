@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-lg-12">
            <h2 class="d-inline-block">Show User</h2>
            <a class="btn btn-primary float-end" href="{{ route('users.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <strong>Name:</strong>
                <p>{{ $user->name }}</p>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <strong>Email:</strong>
                <p>{{ $user->email }}</p>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <strong>Roles:</strong>
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $role)
                        <span class="badge bg-secondary">{{ $role }}</span>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
