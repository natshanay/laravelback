@extends('app.layout')
@section('reservation')
@include('partitions.sidebar')
<div class="container my-5">
    <h1 class="mb-4">Add New Reservation</h1>
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="car_id" class="form-label">Car:</label>
                <select class="form-select" name="car_id" id="car_id" required>
                    @foreach ($cars as $car)
                        <option value="{{ $car->id }}">{{ $car->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="mb-3">
            <label for="customer_id" class="form-label">Customer:</label>
            <select class="form-select" name="customer_id" id="customer_id" required>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="payment_id" class="form-label">Payment Method:</label>
            <select class="form-select" name="payment_id" id="payment_id" required>
                @foreach ($payments as $payment)
                    <option value="{{ $payment->id }}">{{ $payment->payment_method }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Payment Amount:</label>
            <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter amount" required>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date:</label>
            <input type="date" class="form-control" name="start_date" id="start_date" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">End Date:</label>
            <input type="date" class="form-control" name="end_date" id="end_date" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select class="form-select" name="status" id="status" required>
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Reservation</button>
    </form>
</div>

@include('partitions.sidebut')

@endsection
