@include('partitions.sidebar')
@extends('app.layout')
@section('reserve')
<body>
    <div class="container my-5">
      <h1 class="mb-4">Process Payment</h1>
      <form action="{{ route('payments.store') }}" method="POST" class="card p-4">
        @csrf
        <div class="form-group">

        </div>
        <div class="form-group">
          <label for="payment_method">Payment Method:</label>
          <input type="text" name="payment_method" id="payment_method" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Process Payment</button>
      </form>
    </div>
  </body>
  @include('partitions.sidebut')
  @endsection
