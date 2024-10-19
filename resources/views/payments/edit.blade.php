@include('partitions.sidebar')
@extends('cars.mylayout')
@section('content')
<div class="form-area">

                <form method="POST" action="{{ route('payments.update' , $payment->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method("put")
                    <div class="form-group">
                        <label for="payment_method">Payment Method:</label>
                        <input type="text" name="payment_method" id="payment_method" class="form-control" value="{{ $payment->payment_method }}">
                      </div>
                      <div class="form-group">
                        <label for="amount">Amount:</label>
                        <input type="number" name="amount" id="amount" step="0.01" class="form-control" value="{{ $payment->amount }}">
                      </div>
                      <div class="form-group">
                        <label for="status">Status:</label>
                        <input type="text" name="status" id="status" class="form-control" value="{{ $payment->status }}">
                      </div>
                      <div class="form-group">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </div>
                </form>

            </div>
            @include('partitions.sidebut')
@endsection
