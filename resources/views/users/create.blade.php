<!-- resources/views/users/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New User</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- User creation form -->
    <form action="{{ route('users.store') }}" method="POST">
        @csrf <!-- CSRF protection -->

        <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" name="fname" class="form-control" required value="{{ old('fname') }}">
        </div>

         <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" class="form-control" required value="{{ old('lname') }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label for="mobileno">Mobile No</label>
            <input type="text" name="mobileno" class="form-control" required value="{{ old('mobileno') }}">
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" name="role" class="form-control" value="{{ old('role', $user->role) }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add User</button>
    </form>
</div>
@endsection
