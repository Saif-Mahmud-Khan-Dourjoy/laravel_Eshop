
@extends('frontend.master.master')
@section('title')
<title> {{$products->title}} || EShop</title>
@endsection


@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-4 mt-5">
       <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
     @php
     $i=1;
     @endphp
     @foreach($products->image as $image)
    <div class="bg-dark carousel-item {{ $i==1 ? 'active':''}}" >
      <img class="d-block w-100" src="{{asset($image->image)}}" alt="First slide">
    </div>
    @php
     $i++;
     @endphp
    @endforeach

  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> 
      </div>
      <div class="col-md-4"> </div>
      <div class="col-md-4">
      <div style="margin-top: 20px">
        <h3> {{$products->title}} <span class="badge badge-primary">{{$products->quantity <1 ? 'Item Not Available':$products->quantity. ' Item Available'}}</span> </h3>
       
        
         
        <div class="card" >
        
          @php
             $i=1;
          @endphp
          @foreach($products->image as $image)
          
          @if($i>0)
          <img class="card-img-top" style="height: 200px" src="{{asset($image->image)}}" alt="Card image">
          @endif
        
            @php
          $i--;
          @endphp
            @endforeach
        <div class="card-body text-center">
          <h4 class="card-title">{{$products->title}}</h4>
          <p class="card-text">{{$products->price}}</p>
          <hr>
          <p class="card-text">{{$products->description}}</p>
        </div>
        </div>
        </div>

      
          
        </div>

        
      </div>
    </div>
    </div>
  </div>
  @endsection
