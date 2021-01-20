@extends('backend.admin.master.master')
@section('title')
<title>All Category</title>
@endsection

@section('content')

    <div class="container">
  <div class="card">
  <div class="card-header">All Category</div>
 @include('backend.admin.partials.message')
  <div class="card-body">
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No#</th>
      <th scope="col">Name</th>
      <th scope="col">Parent Name</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
    
  </thead>
  <tbody>
      @php
      $i=1;
      @endphp
    @foreach($category as $category)
        <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$category->name}}</td>
      <td>
        @if($category->parent_id==NULL)
         Primary Category
         @else
         {{ $category->parents->name}}
        @endif 

      </td>
      <td>
        <img src="{{asset($category->image)}}" style="height: 80px; width: 80px">
      </td> 
     
     
      <td>
        <a class="btn btn-outline-success" href="{{route('admin.category.edit',$category->id)}}">Edit</a>
        <a class="btn btn-outline-danger" data-toggle="modal" href="#deleteModal{{$category->id}}">Delete</a>

      <div class="modal fade" id="deleteModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are You Sure?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{route('admin.category.delete',$category->id)}}" method="post">
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