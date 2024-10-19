<!DOCTYPE html>
<html>
<head>
    <title>Receipt for order #{{ $order->id }}</title>
    <style>
        /* Add your PDF styling here */
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    
    <h1>Receipt for order #{{ $order->id }}</h1>

    <div>
        <h2>order Details</h2>
        <p>
            <strong>Car:</strong> {{ $order->car->name }}<br>
            <strong>Customer:</strong> {{ $order->customer->name }}<br>
            <strong>Start Date:</strong> {{ $order->start_date }}<br>
            <strong>End Date:</strong> {{ $order->end_date }}<br>
            <strong>Total Amount:</strong> {{ $order->amount }}
        </p>
    </div>

    <h2>Payment History</h2>
    <table>
        <thead>
            <tr>
                <th>Payment ID</th>
                <th>Payment Method</th>
                <th>Payment Date</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->payment_method }}</td>
                    <td>{{ $payment->payment_date }}</td>
                    <td>{{ $payment->amount }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
