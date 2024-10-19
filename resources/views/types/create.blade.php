@extends('app.layout')

@section('models')
@include('partitions.sidebar')

<div class="container-fluid px-4">
    <h1 class="mt-4">Add New Type</h1>

    <form action="{{ route('types.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="name" class="form-label">How Many Person:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Type</button>
    </form>
</div>

@include('partitions.sidebut')
@endsection
