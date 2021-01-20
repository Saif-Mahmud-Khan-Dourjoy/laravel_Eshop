@extends('backend.admin.master.master')

@section('title')

<title>Edit Category</title>

@endsection

@section('content')
<div class="content-wrapper">
       
 <div class="card">
  <div class="card-header">Edit Category</div>
  <div class="card-body">
    @include('backend.admin.partials.message')
    <form method="post" action="{{route('admin.category.update',$category->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="name" value="{{$category->name}}" class="form-control" placeholder="Enter name" name="name" id="name">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea cols="20" rows="5"  name="description" class="form-control">{{$category->description}}</textarea>
  </div>
 
  <div class="my-2">
    <select class="form-control form-control-lg" name="parent_id">
  <option value="">Select Parent</option>
  @foreach($main_category as $cat)
  <option value="{{$cat->id}}" {{ $cat->id==$category->parent_id ?'selected':'' }} >{{$cat->name}}</option>
  @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="oldImage">Old Image</label> <br>

    @if(!is_null($category->image))
    <input type="hidden" value="{{$category->image}}" name="oldImage">
    <img src="{{asset($category->image)}}" style="height: 80px; width: 80px"> <br>
    @else
    <!-- <input type="hidden" value="NULL" name="oldImage"> -->
    <p>No Previous Image</p>
    @endif
    <label for="NewImage">New Image</label>

    <input type="file" class="form-control" name="image"  id="image" >
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
  </div>
  
</div>


 </div>
 @endsection