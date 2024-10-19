@extends('app.layout')
@section('customer')

@include('partitions.sidebar')

<div class="container my-5">
    <h1 class="mb-4">Customer List</h1>
    <a href="{{ route('customers.create') }}" class="btn btn-primary btn-lg mb-3">
        <i class="fas fa-plus-circle"></i> Add New Customer
    </a>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatablesSimple" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-primary btn-sm me-2">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-secondary btn-sm me-2">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this customer?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('partitions.sidebut')

@endsection
