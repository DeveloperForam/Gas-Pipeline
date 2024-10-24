@extends('layouts.layout')

{{-- @section('title', 'Add New Property') --}}

{{-- @section('content')
    <h1>Add New Property</h1>

    <form action="{{ route('properties.create') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="property_name" class="form-label">Property Name</label>
            <input type="text" name="property_name" class="form-control" id="property_name" required>
        </div>

        <div class="mb-3">
            <label for="property_type" class="form-label">Property Type</label>
            <select name="property_type" id="property_type" class="form-select">
                <option value="House">House</option>
                <option value="Building">Building</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="distance" class="form-label">Distance</label>
            <input type="number" step="0.00" name="distance" class="form-control" id="distance" required >
        </div>

        <div class="mb-3">
            <label for="property_owner_name" class="form-label">Property Owner Name</label>
            <input type="text" name="property_owner_name" class="form-control" id="property_owner_name" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="address" required>
        </div>

        <button type="submit" class="btn btn-success">Add Property</button>
    </form>
@endsection --}}


<!-- resources/views/users/create.blade.php -->

{{-- @extends('layouts.app') --}}

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
    <form action="{{ route('properties.store') }}" method="POST">
        @csrf <!-- CSRF protection -->

      <div class="mb-3">
            <label for="property_name" class="form-label">Property Name</label>
            <input type="text" name="property_name" class="form-control" id="property_name" >
        </div>

        <div class="mb-3">
            <label for="property_type" class="form-label">Property Type</label>
            <select name="property_type" id="property_type" class="form-select">
                <option value="House">House</option>
                <option value="Building">Building</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="distance" class="form-label">Distance</label>
            <input type="number" step="0.00" name="distance" class="form-control" id="distance"  >
        </div>

        <div class="mb-3">
            <label for="property_owner_name" class="form-label">Property Owner Name</label>
            <input type="text" name="property_owner_name" class="form-control" id="property_owner_name" >
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="address" >
        </div>

        <button type="submit" class="btn btn-success">Add Property</button>
    </form>
</div>
@endsection
