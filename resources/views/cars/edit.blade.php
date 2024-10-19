@include('partitions.sidebar')
@extends('app.layout')
@section('reserve')
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Car</h1>
        <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $car->name }}" required>
            </div>

            <div class="mb-3">
                <label for="model" class="form-label">Model:</label>
                <input type="text" name="model" id="model" class="form-control" value="{{ $car->model->name }}" required>
            </div>



            <div class="mb-3 form-check">
                <input type="checkbox" name="availability" id="availability" class="form-check-input" value="1" {{ $car->availability ? 'checked' : '' }}>
                <label for="availability" class="form-check-label">Available</label>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update Car</button>
            <a href="{{ route('cars.index') }}" class="btn btn-secondary">Back to List</a>
        </form>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>

@include('partitions.sidebut')
@endsection
