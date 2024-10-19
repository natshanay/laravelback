@extends('app.layout')
@section('shw')
@include('partitions.sidebar')

    <body>
        <div class="container mt-5">
            <h1 class="mb-4">Car Details</h1>
            <div class="card">
                <div class="card-body">
                    <p class="card-text"><strong>Name:</strong> {{ $car->name }}</p>
                    <p class="card-text"><strong>Model:</strong> {{ $car->model->name }}</p>
                    <p class="card-text"><strong>Availability:</strong>
                        {{ $car->availability ? 'Available' : 'Not Available' }}</p>

                    <div>
                        <div class="row image-gallery">
                            @foreach ($proimages as $proimage)
                            <div class="col-md-4 mb-4">
                                <div class="image-card">
                                    <img src="{{ asset('images/' . $proimage->images) }}" class="img-fluid" alt="{{ $proimage->images }}" />
                                </div>

                            </div>
                            @endforeach
                            <div class="card-footer">
                                <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary mr-2">Edit</a>
                                <a href="{{ route('cars.index') }}" class="btn btn-secondary">Back to List</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Include Bootstrap JS and dependencies -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    </body>
    @include('partitions.sidebut')
@endsection

