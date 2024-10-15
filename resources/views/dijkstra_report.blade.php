<!DOCTYPE html>
<html>
<head>
    <title>Shortest Path Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        .report-container {
            margin: 20px;
        }
        .path-details {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="report-container">
        <h1>Shortest Path Report</h1>

        <p><strong>From Destination:</strong> {{ $start }}</p>
        <p><strong>To Destination:</strong> Gas Station</p>

        <div class="path-details">
            <p><strong>Total Distance:</strong> {{ $shortest_path['distance'] }}</p>
            @if(!empty($shortest_path['path']))
                <p><strong>Path:</strong> {{ implode(' -> ', $shortest_path['path']) }}</p>
            @else
                <p>No path found</p>
            @endif

            dd($shortest_path);
        </div>
    </div>
</body>
</html>
