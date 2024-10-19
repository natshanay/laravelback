@include('partitions.sidebar')
@extends('car.layout')
@section('naty')
<div class="form-area">
                <form method="POST" action="{{ url('reserve/'.$natie->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method("put")
                    <div class="row">
                        <div class="col-md-6">
                            <label>Product Name</label>
                            <input type="text" class="form-control" name="name"  value="{{$natie->name}}">
                        </div>
                      

                        <div class="col-md-6">
                            <label>address</label>
                            <input type="text" class="form-control" name="address"  value="{{$natie->address}}">
                        </div>
                             <div class="col-md-6">
                            <label>phone</label>
                            <input type="text" class="form-control" name="phone"  value="{{$natie->phone}}">
                        </div>

              
                        <div class="col-md-6">
                            <label>Image</label>
                            <input class="form-control" name="photo" type="file" id="photo" value="{{$natie->photo}}">
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Register">
                        </div>
                    </div>
                </form>



            </div>
            @endsection