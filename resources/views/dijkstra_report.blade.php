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
<?php 
?>
<body>
    <div class="report-container">
        <h1>Shortest Path Report</h1>
        <p><strong>From Destination:</strong> {{ $start }}</p>
        <p><strong>To Destination:</strong> Gas Station</p>

        <div class="path-details">
            <p><strong>Total Distance:</strong> {{ $shortest_path }}</p>
            <p><strong>Path:</strong> {{ $shortest_path }} </p>
        </div>
    </div>
</body>
</html>
