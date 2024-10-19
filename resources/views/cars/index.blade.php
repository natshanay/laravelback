@extends('app.layout')
@section('car')
@include('partitions.sidebar')
<div class="container mt-5">
    <h1 class="mb-4">Car List</h1>
    <a href="{{ route('cars.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus-circle"></i> Add New Car
    </a>

    @if(session('status'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatablesSimple" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Model</th>
                            <th>Type</th>
                            <th>Available</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Model</th>
                            <th>Type</th>
                            <th>Available</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($cars as $car)
                        <tr>
                            <td>{{ $car->name }}</td>
                            <td>{{ $car->model->name ?? 'No Model' }}</td>
                            <td>{{ $car->type }}</td>
                            <td>{{ $car->availability ? 'Available' : 'Not Available' }}</td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('cars.show', $car->id) }}" class="btn btn-info btn-sm me-2">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning btn-sm me-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this car?');">
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
<!-- Include Bootstrap JS and dependencies -->

@include('partitions.sidebut')
@endsection
