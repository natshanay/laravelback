@extends('app.layout')
@include('partitions.sidebar')
@section('reserve')
    <div class="container my-5">
        <h1 class="mb-4 text-center">Reservation Details</h1>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Reservation Information</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row" class="text-nowrap">Customer Name:</th>
                            <td>{{ $reservation->customer->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-nowrap">Car Name:</th>
                            <td>{{ $reservation->car->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-nowrap">Model Name:</th>
                            <td>{{ $reservation->car->model->name ?? 'No Model' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-nowrap">Type:</th>
                            <td>{{ $reservation->car->type ?? 'No type' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-nowrap">Start Date:</th>
                            <td>{{ $reservation->start_date }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-nowrap">End Date:</th>
                            <td>{{ $reservation->end_date }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-nowrap">Amount:</th>
                            <td>{{ $reservation->amount }}$</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-nowrap">Status:</th>
                            <td>{{ $reservation->status }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-primary me-2">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('reservations.download', $reservation->id) }}" class="btn btn-success me-2">
                        <i class="fas fa-download"></i> Download
                    </a>
                    <a href="{{ route('reservations.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('partitions.sidebut')
@endsection
