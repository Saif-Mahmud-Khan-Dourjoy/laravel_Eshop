@extends('backend.admin.master.master')

@section('title')

<title>Edit Product</title>

@endsection

@section('content')
<div class="content-wrapper">
       
 <div class="card">
  <div class="card-header">Edit Product</div>
  <div class="card-body">
  	@include('backend.admin.partials.message')
  	<form method="post" action="{{route('admin.product.update',$product->id)}}" enctype="multipart/form-data">
  		{{csrf_field()}}
  <div class="form-group">
    <label for="title">Title</label>
    <input type="title" class="form-control" value="{{$product->title}}" placeholder="Enter title" name="title" id="title">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea cols="20" rows="5" name="description" class="form-control">{{$product->description}}</textarea>
  </div>
 <div class="form-group">
    <label for="price">Price</label>
    <input type="price" class="form-control" value="{{$product->price}}" placeholder="Enter price" name="price" id="price">
  </div>
  <div class="form-group">
    <label for="quantity">Quantity</label>
    <input type="quantity" class="form-control" value="{{$product->quantity}}" placeholder="Enter quantity" name="quantity" id="quantity">
  </div>
  <div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control" name="images[]"  id="image" multiple>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
  </div>
  
</div>


 </div>
 @endsection