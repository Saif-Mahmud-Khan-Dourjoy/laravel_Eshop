 <div style="margin-top: 20px">
      @foreach(App\Models\Category::where('parent_id',NULL)->get() as $parent)
      <a href="#parent-{{$parent->id}}" data-toggle="collapse" class="list-group-item list-group-item-action">
         <img src="{{asset($parent->image)}}" style="height: 50px;width: 50px">
      	{{$parent->name}}</a>
      	
      	<div class="collapse" id="parent-{{$parent->id}}">
      		@foreach(App\Models\Category::where('parent_id',$parent->id)->get() as $child)
      		    <a  class="child-item list-group-item list-group-item-action">
            	<img src="{{asset($child->image)}}" style="height: 30px;width: 30px">
      	   		{{$child->name}}</a>
      		@endforeach
      	</div>
      
      @endforeach
      </div>
       