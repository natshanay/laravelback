@extends('app.layout')
@section('customercreate')
@include('partitions.sidebar')
<body>
    <div class="container my-5">
        <h1 class="mb-4">Add New Customer</h1>
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required class="form-control">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Add Customer</button>
        </form>
    </div>
</body>
@include('partitions.sidebut')
@endsection
