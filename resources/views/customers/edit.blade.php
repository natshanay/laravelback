@extends('app.layout')
@section('edit')
@include('partitions.sidebar')
<body>
    <div class="container my-5">
        <h1 class="mb-4">Edit Customer</h1>
        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ $customer->name }}" required class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ $customer->email }}" required class="form-control">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" value="{{ $customer->phone }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update Customer</button>
        </form>
    </div>
</body>
@include('partitions.sidebut')
@endsection
