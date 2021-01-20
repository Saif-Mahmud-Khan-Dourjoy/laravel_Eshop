@extends('backend.admin.master.master')

@section('title')

<title>Add Category</title>

@endsection

@section('content')
<div class="content-wrapper">
       
 <div class="card">
  <div class="card-header">Add Category</div>
  <div class="card-body">
  	@include('backend.admin.partials.message')
  	<form method="post" action="{{route('admin.category.store')}}" enctype="multipart/form-data">
  		{{csrf_field()}}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="name" class="form-control" placeholder="Enter name" name="name" id="name">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea cols="20" rows="5" name="description" class="form-control"></textarea>
  </div>
 
  <div class="my-2">
    <select class="form-control form-control-lg" name="parent_id">
  <option value="">Select Parent</option>
  @foreach($category as $category)
  <option value="{{$category->id}}">{{$category->name}}</option>
  @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control" name="image"  id="image" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
  
</div>


 </div>
 @endsection