@extends('app.layout')

@section('reserve')
@include('partitions.sidebar')

<div class="container my-5">
    <h1 class="mb-4">Edit Reservation</h1>

    <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Car Selection -->
        <div class="mb-3">
            <label for="car" class="form-label">Car:</label>
            <select class="form-select" name="car_id" id="car" required>
                @foreach ($cars as $car)
                    <option value="{{ $car->id }}" {{ $reservation->car_id == $car->id ? 'selected' : '' }}>
                        {{ $car->name }}
                    </option>r
                @endforeach
            </select>
        </div>

        <!-- Customer Selection -->
        <div class="mb-3">
            <label for="customer" class="form-label">Customer:</label>
            <select class="form-select" name="customer_id" id="customer" required>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $reservation->customer_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Payment Amount -->
        <div class="mb-3">
            <label for="amount" class="form-label">Payment Amount:</label>
            <input type="number" class="form-control" name="ammount" id="amount" value="{{ $reservation->amount }}" step="0.01" min="0" required>
        </div>

        <!-- Start Date -->
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date:</label>
            <input type="date" class="form-control" name="start_date" id="start_date" value="{{ $reservation->start_date  }}" required>
        </div>

        <!-- End Date -->
        <div class="mb-3">
            <label for="end_date" class="form-label">End Date:</label>
            <input type="date" class="form-control" name="end_date" id="end_date" value="{{ $reservation->end_date  }}" required>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select class="form-select" name="status" id="status" required>
                <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="cancelled" {{ $reservation->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Reservation</button>
    </form>

    <!-- Back to Reservation List -->
    <a href="{{ route('reservations.index') }}" class="btn btn-secondary mt-3">Back to Reservation List</a>
</div>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@include('partitions.sidebut')
@endsection
