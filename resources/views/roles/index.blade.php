@extends('layouts.master')

@section('content')
<div class="container py-4 shadow-card">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Role Management</h4>
                @can('role-create')
                    <a class="btn btn-primary" href="{{ route('roles.create') }}">Create New Role</a>
                @endcan
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success" id="notification">
            <p class="mb-0">{{ $message }}</p>
        </div>
    @endif

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    @if (strtolower($role->name) !== strtolower('Admin'))
                        <td>
                            <div class="d-flex align-items-center">
                                @can('role-view')
                                    <a class="mx-2" href="{{ route('roles.show', $role->id) }}">
                                        <i class="fas fa-eye text-warning"></i>
                                    </a>
                                @endcan
                                @can('role-edit')
                                    <a class="mx-2" href="{{ route('roles.edit', $role->id) }}" data-bs-original-title="Edit role">
                                        <i class="fas fa-user-edit text-secondary"></i>
                                    </a>
                                @endcan
                                @can('role-delete')
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn p-0 shadow-none">
                                            <i class="fas fa-trash text-danger"></i>
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $roles->links() !!}
    </div>
</div>
@endsection
