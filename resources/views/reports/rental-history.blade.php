<!DOCTYPE html>
<html>
<head>
    <title>Rental History</title>
</head>
<body>
    <h1>Rental History</h1>
    <table>
        <thead>
            <tr>
                <th>Car</th>
                <th>Customer</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->car->name }}</td>
                    <td>{{ $reservation->customer->name }}</td>
                    <td>{{ $reservation->start_date }}</td>
                    <td>{{ $reservation->end_date }}</td>
                    <td>{{ $reservation->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
