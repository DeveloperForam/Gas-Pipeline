@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User List</h1>

    <!-- Display success message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add user button -->
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add User</a>

    <!-- User list table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Mobile No</th>
                <th>Role</th>
                <th>Status</th>
                {{-- <th>Actions</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->fname }}</td>
                <td>{{ $user->lname }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->mobileno }}</td>
                <td>{{ $user->role }}</td>
                {{-- <td>
                    @if($user->status)
                        <span class="badge badge-success">Active</span>
                    @else
                        <span class="badge badge-success">Inactive</span>
                    @endif
                </td> --}}
                <td>
                    <a href="{{ route('users.store', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <!-- Toggle Status -->
                    <form action="{{ route('users.toggleStatus', $user->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-sm {{ $user->status ? 'btn-danger' : 'btn-success' }}">
                            {{ $user->status ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
