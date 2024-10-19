@include('partitions.sidebar')
@extends('car.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Name : {{ $contacts->name }}</h5>
        <p class="card-text">Address : {{ $contacts->address }}</p>
        <p class="card-text">Phone : {{ $contacts->mobile }}</p>
        <p class="card-text">Phone : {{ $contacts->photo }}</p>
        <div>
        <img src="{{ asset('./images/' . $contacts->photo) }}" alt="{{ $contacts->name }}" width="300" height="400" class="img-fluid">
        </div>
        
  </div>
       
    </hr>
  
  </div>
</div>

@endsection