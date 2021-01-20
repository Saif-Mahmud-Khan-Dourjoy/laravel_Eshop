
@extends('frontend.master.master')
@section('title')
<title>Eshop</title>
@endsection


@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-4">
       @include('frontend.partials.sidebar') 
      </div>
      <div class="col-md-8">
      <div style="margin-top: 20px">
        <h3>Featured Products</h3>
        <div class="row">
          <div class="col-md-4">
        <div class="card" >
        <img class="card-img-top" src="{{asset('img/d.jpg')}}" alt="Card image">
        <div class="card-body text-center">
          <h4 class="card-title">Samsung</h4>
          <p class="card-text">$500</p>
          <a href="#" class="btn btn-outline-warning">See Profile</a>
        </div>
        </div>
        </div>
          
        </div>

        
      </div>
    </div>
    </div>
  </div>
  @endsection
