@extends('layouts.layout')

@section('title', 'Property List')

@section('content')
    <h1>Properties</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Property Name</th>
                <th>Type</th>
                <th>Distance</th>
                <th>Owner Name</th>
                <th>Address</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $property)
                <tr>
                    <td>{{ $property->property_name }}</td>
                    <td>{{ $property->property_type }}</td>
                    <td>{{ $property->distance }}</td>
                    <td>{{ $property->property_owner_name }}</td>
                    <td>{{ $property->address }}</td>
                    <td>
                        @if ($property->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-primary btn-sm">Edit</a>

                        <form action="{{ route('properties.destroy', $property->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>

                        <form action="{{ route('properties.update', $property->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="is_active" value="{{ $property->is_active ? 0 : 1 }}">
                            <button type="submit" class="btn btn-sm {{ $property->is_active ? 'btn-warning' : 'btn-success' }}">
                                {{ $property->is_active ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
