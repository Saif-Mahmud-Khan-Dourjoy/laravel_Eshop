@extends('backend.admin.master.master')

@section('title')

<title>Add Produc</title>

@endsection

@section('content')
<div class="content-wrapper">
       
 <div class="card">
  <div class="card-header">Add Product</div>
  <div class="card-body">
   @include('backend.admin.partials.message')
  	<form method="post" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
  		{{csrf_field()}}
  <div class="form-group">
    <label for="title">Title</label>
    <input type="title" class="form-control" placeholder="Enter title" name="title" id="title">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea cols="20" rows="5" name="description" class="form-control"></textarea>
  </div>
 <div class="form-group">
    <label for="price">Price</label>
    <input type="price" class="form-control" placeholder="Enter price" name="price" id="price">
  </div>
  <div class="form-group">
    <label for="quantity">Quantity</label>
    <input type="quantity" class="form-control" placeholder="Enter quantity" name="quantity" id="quantity">
  </div>
  <div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control" name="images[]"  id="image" multiple>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
  
</div>


 </div>
 @endsection