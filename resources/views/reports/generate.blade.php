<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Report</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Generate Report</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Car</th>
                <th>Customer</th>
                <th>Reservation Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->car->model }}</td>
                <td>{{ $item->customer_name }}</td>
                <td>{{ $item->created_at->format('Y-m-d') }}</td>
                <td>{{ $item->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
