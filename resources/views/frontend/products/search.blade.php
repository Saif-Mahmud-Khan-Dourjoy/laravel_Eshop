
@extends('frontend.master.master')
@section('title')
<title>{{$search}}</title>
@endsection


@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-4">
       @include('frontend.partials.sidebar') 
      </div>
      <div class="col-md-8">
      <div style="margin-top: 20px">
        <h3>Search result for <span class="badge badge-primary">{{$search}}</span> </h3>
        <div class="row">
        @foreach($products as $product)
          <div class="col-md-4">
        <div class="card" >
        	@php
             $i=1;
        	@endphp
        	@foreach($product->image as $image)
        	
        	@if($i>0)
        	<img class="card-img-top" style="height: 200px" src="{{asset($image->image)}}" alt="Card image">
        	@endif
        
            @php
        	$i--;
        	@endphp
            @endforeach
        <div class="card-body text-center">
          <h4 class="card-title">{{$product->title}}</h4>
          <p class="card-text">{{$product->price}}</p>
          <a href="#" class="btn btn-outline-warning">Add to Cart</a>
        </div>
        </div>
        </div>

        @endforeach
          
        </div>

        
      </div>
    </div>
    </div>
  </div>
  @endsection
