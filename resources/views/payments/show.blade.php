@include('partitions.sidebar')
@extends('app.layout')
@section('reserve')
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">Payment Method : {{ $payment->payment_method }}</h5>
  </div>

    </hr>

  </div>
</div>

@include('partitions.sidebut')
@endsection
