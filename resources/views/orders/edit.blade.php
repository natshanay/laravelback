@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4">Edit order #{{ $order->id }}</h1>

        <form action="{{ route('receipts.update', $order) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="car">Car</label>
                <input type="text" class="form-control" id="car" name="car" value="{{ $order->car->name }}" disabled>
            </div>

            <div class="form-group">
                <label for="customer">Customer</label>
                <input type="text" class="form-control" id="customer" name="customer" value="{{ $order->customer->name }}" disabled>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $order->start_date }}">
            </div>

            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $order->end_date }}">
            </div>

            <div class="form-group">
                <label for="amount">Total Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" value="{{ $order->amount }}">
            </div>

            <h2 class="mb-4 mt-5">Payment History</h2>

            @foreach ($payments as $payment)
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="payment_method_{{ $payment->id }}">Payment Method</label>
                            <input type="text" class="form-control" id="payment_method_{{ $payment->id }}" name="payment_method_{{ $payment->id }}" value="{{ $payment->payment_method }}">
                        </div>

                        <div class="form-group">
                            <label for="payment_date_{{ $payment->id }}">Payment Date</label>
                            <input type="date" class="form-control" id="payment_date_{{ $payment->id }}" name="payment_date_{{ $payment->id }}" value="{{ $payment->payment_date }}">
                        </div>

                        <div class="form-group">
                            <label for="payment_amount_{{ $payment->id }}">Payment Amount</label>
                            <input type="number" class="form-control" id="payment_amount_{{ $payment->id }}" name="payment_amount_{{ $payment->id }}" value="{{ $payment->amount }}">
                        </div>
                    </div>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
