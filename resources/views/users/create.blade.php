@extends('layouts.master')

@section('content')

<div class="container py-4 shadow-card">
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h4>Créer Un Nouvel Utilisateur
                    <div class="float-end">
                        <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
                    </div>
                </h4>
            </div>
        </div>
    </div>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="nom"><strong>Name:</strong></label>
                    <input type="text" id="nom" name="nom" value="{{ old('nom') }}" class="form-control" placeholder="nom">
                    @error('nom')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="email"><strong>Email:</strong></label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                    @error('email')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="password"><strong>Password:</strong></label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    @error('password')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="confirm-password"><strong>Confirm Password:</strong></label>
                    <input type="password" id="confirm-password" name="confirm-password" class="form-control" placeholder="Confirm Password">
                    @error('confirm-password')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <label for="roles"><strong>Role:</strong></label>
                    <select class="form-control" id="roles" name="roles[]" multiple>
                        @foreach ($roles as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                    </select>
                    @error('roles')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 mb-3 text-left">
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
        </div>
    </form>
</div>
@endsection
