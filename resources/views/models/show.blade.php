@include('partitions.sidebar')
@extends('app.layout')
@section('reserve')
<body>
    <div class="container my-5">
        <h1 class="mb-4">model Details</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>Name:</strong> {{ $model->name }}</p>

            </div>
            <div class="card-footer">
                <a href="{{ route('models.edit', $model->id) }}" class="btn btn-primary mr-2">Edit</a>
                <a href="{{ route('models.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</body>
@include('partitions.sidebut')
@endsection
