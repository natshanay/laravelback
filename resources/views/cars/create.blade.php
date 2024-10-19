@extends('app.layout')
@include('partitions.sidebar')
@section('create')
<div class="container-fluid px-4">

    <h1 class="mt-4">Add New Car</h1>
    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
            <div class="alert alert-warning">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Type:</label>
            <input type="text" name="type" id="type" class="form-control" required>
        </div>
        <label for="model_id" class="form-label">Model:</label>
        <select class="form-select" name="model_id" id="model_id" required>
            @foreach ($models as $model)
            <option value="{{ $model->id }}">{{ $model->name }}</option>
            @endforeach
        </select>
        <div class="form-check mb-3">
            <input type="checkbox" name="availability" id="availability" class="form-check-input" value="1">
            <label for="availability" class="form-check-label">Available</label>
        </div>
        <div class="mb-3">
            <label for="images" class="form-label">Images:</label>
            <input type="file" name="images[]" id="images" class="form-control" multiple>
        </div>

        <button type="submit" class="btn btn-primary">Add Car</button>
    </form>
</div>
@include('partitions.sidebut')
@endsection
