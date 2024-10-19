@include('partitions.sidebar')
@extends('app.layout')
@section('payment')

<div class="container my-5">
    <h1 class="mb-4">Payments</h1>
    <a href="{{ route('payments.create') }}" class="btn btn-primary btn-lg mb-3">
        <i class="fas fa-plus-circle"></i> Add Payment
    </a>
    <div class="card-body">
        <table id="datatablesSimple" class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Payment Method</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>id</th>
                    <th>Payment Method</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->payment_method }}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-primary btn-sm mr-2">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-secondary btn-sm mr-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
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

  @include('partitions.sidebut')
@endsection
