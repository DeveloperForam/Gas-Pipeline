<!-- resources/views/users/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit User</h1>

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

    <!-- Edit user form -->
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" name="fname" class="form-control" value="{{ old('fname', $user->fname) }}" required>
        </div>

        <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" class="form-control" value="{{ old('lname', $user->lname) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="mobileno">Mobile No</label>
            <input type="text" name="mobileno" class="form-control" value="{{ old('mobileno', $user->mobileno) }}" required>
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" name="role" class="form-control" value="{{ old('role', $user->role) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>
@endsection
