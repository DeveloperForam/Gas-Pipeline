@extends('layouts.app')
@section('content')
{{-- <!DOCTYPE html>
<html>
<head>
    <title>Shortest Path using Dijkstra's Algorithm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body> --}}
    <div class="container mt-5">
        <h1>Find Shortest Path from Destination to Gas Station</h1>
        
        <!-- Form to select the 'From' node -->
        <form action="{{ route('findShortestPath') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="start" class="form-label">Select From Destination:</label>
                <select name="start" id="start" class="form-control">
                    <option value="Select">Please Select From Destination</option>
                    <option value="School">School</option>
                    <option value="Hospital">Hospital</option>
                    <option value="Mall">Mall</option>
                    <option value="Air Port">Airport</option>
                    <option value="House 1">House 1</option>
                    <option value="House 2">House 2</option>
                    <option value="House 3">House 3</option>
                    <option value="House 4">House 4</option>
                    <option value="House 5">House 5</option>
                    <option value="Fire Station">Fire Station</option>
                    <option value="Temple">Temple</option>
                </select>
            </div>

            <!-- Static To Destination -->
            <div class="mb-3">
                <label for="end" class="form-label">To Destination:</label>
                <input type="text" id="end" class="form-control" value="Gas Station" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Find Shortest Path</button>
        </form>

        <!-- Display the results after submission -->
        @if(isset($shortest_path))
            <div class="mt-5">
                <h2>Shortest Path from {{ $start }} to Gas Station</h2>
                <p><strong>Distance:</strong> {{ $shortest_path['distance'] }}</p>
                
                @if(!empty($shortest_path['path']))
                    <p><strong>Path:</strong> {{ implode(' -> ', $shortest_path['path']) }}</p>
                @else
                    <p>No path found</p>
                @endif
            </div>
        
             {{-- Download PDF Button --}}
            <form action="{{route('downloadPDF')}}" method="POST">
            @csrf
            <input type="hidden" name="start" value="{{$start}}">
            <button type="submit" class="btn btn-success mt-3">Download Report</button>
            </form>

        @endif
    </div>
@endsection
