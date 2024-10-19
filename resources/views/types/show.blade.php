@include('partitions.sidebar')
@extends('app.layout')
@section('reserve')
<body>
    <div class="container my-5">
        <h1 class="mb-4">type Details</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>Type of Car:</strong> {{ $type->name }}</p>

            </div>
            <div class="card-footer">
                <a href="{{ route('types.edit', $type->id) }}" class="btn btn-primary mr-2">Edit</a>
                <a href="{{ route('types.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</body>
@include('partitions.sidebut')
@endsection
