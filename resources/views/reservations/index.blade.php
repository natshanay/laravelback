@extends('app.layout')

@section('reserve')
@include('partitions.sidebar')

<div class="container my-5">
    <h1 class="mb-4 text-center">Reservation List</h1>

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('reservations.create') }}" class="btn btn-primary btn-lg">
            <i class="fas fa-plus-circle"></i> Add New Reservation
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Reservation Data
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatablesSimple" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Car Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Payment Method</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->customer->name }}</td>
                            <td>{{ $reservation->car->name }}</td>
                            <td>{{ $reservation->start_date }}</td>
                            <td>{{ $reservation->end_date }}</td>
                            <td>{{ $reservation->payment->payment_method }}</td>
                            <td>${{ number_format( $reservation->amount, 2) }}</td>
                            <td>{{ ucfirst($reservation->status) }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-primary btn-sm me-2">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-secondary btn-sm me-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this reservation?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('partitions.sidebut')

@endsection
