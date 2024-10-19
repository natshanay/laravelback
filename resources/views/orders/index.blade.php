@extends('cars.mylayout')
@include('partitions.sidebar')
@section('content')

    <div class="container my-5">
        <h1 class="mb-4">Receipts</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Reservation ID</th>
                    <th>Car</th>
                    <th>Customer</th>
                    <th>Total Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->car->name }}</td>
                        <td>{{ $order->customer->name }}</td>
                        <td>{{ $order->payment->amount }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary btn-sm">View Receipt</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
