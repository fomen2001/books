@extends('layouts.master')

@section('content')

<div class="container py-4 shadow">
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Create New Role</h2>
                <a class="btn btn-primary" href="{{ route('roles.index') }}">Back</a>
            </div>
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

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <label for="name"><strong>Name:</strong></label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <label><strong>Permission:</strong></label>
                    <div class="d-flex flex-wrap">
                        @foreach ($permission as $value)
                            <div class="form-check me-3">
                                <input type="checkbox" class="form-check-input" id="permission-{{ $value->id }}" name="permission[]" value="{{ $value->id }}">
                                <label class="form-check-label" for="permission-{{ $value->id }}">
                                    {{ $value->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-start">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection
