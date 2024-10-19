@extends('app.layout')
@section('edit')
@include('partitions.sidebar')
<body>
    <div class="container my-5">
        <h1 class="mb-4">Edit type</h1>
        <form action="{{ route('types.update', $type->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Type:</label>e
                <input type="text" name="name" id="name" value="{{ $type->name }}" required class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update type</button>
        </form>
    </div>
</body>
@include('partitions.sidebut')
@endsection

