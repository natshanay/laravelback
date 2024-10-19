@extends('app.layout')
@section('edit')
@include('partitions.sidebar')
<body>
    <div class="container my-5">
        <h1 class="mb-4">Edit Model</h1>
        <form action="{{ route('models.update', $model->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>e
                <input type="text" name="name" id="name" value="{{ $model->name }}" required class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update model</button>
        </form>
    </div>
</body>
@include('partitions.sidebut')
@endsection

