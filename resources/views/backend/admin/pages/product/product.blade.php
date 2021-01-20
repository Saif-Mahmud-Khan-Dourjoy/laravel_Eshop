
@extends('backend.admin.master.master')
@section('title')
<title>All Products</title>
@endsection


@section('content')

<div class="container">
  <div class="card">
  <div class="card-header">All Products</div>
  @include('backend.admin.partials.message')
  <div class="card-body">
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No#</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Action</th>
    </tr>
    
  </thead>
  <tbody>
      @php
      $i=1;
      @endphp
    @foreach($products as $product)
        <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$product->title}}</td>
      <td>{{$product->price}}</td>
      <td>{{$product->quantity}}</td>
      <td>
        <a class="btn btn-outline-success" href="{{route('admin.product.edit',$product->id)}}">Edit</a>
        <a class="btn btn-outline-danger" data-toggle="modal" href="#deleteModal{{$product->id}}">Delete</a>

      <div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are You Sure?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{route('admin.product.delete',$product->id)}}" method="post">
              {{csrf_field()}}
              <button class="btn btn-outline-danger">Delete</button>
            </form>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

      </td>
    </tr>
     @php
      $i++;
      @endphp
    @endforeach
   
  </tbody>
</table>
 </div>
 </div>
</div>


  @endsection
