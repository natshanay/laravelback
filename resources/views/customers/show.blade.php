@include('partitions.sidebar')
@extends('app.layout')
@section('reserve')
<body>
    <div class="container my-5">
        <h1 class="mb-4">Customer Details</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>Name:</strong> {{ $customer->name }}</p>
                <p><strong>Email:</strong> {{ $customer->email }}</p>
                <p><strong>Phone:</strong> {{ $customer->phone }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary mr-2">Edit</a>
                <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</body>
@include('partitions.sidebut')
@endsection
