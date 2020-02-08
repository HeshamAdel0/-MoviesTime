@extends('layouts.admin_panel')
@section('content')
<div class="container-fluid">
    <div class="row">
		<div class="col-12">
		 	<div class="tile">
		    	<h3 class="tile-title">Edit Category [ {{ $category->name }} ]</h3>
		    	<form action="{{ Route('category.update', ['id' =>$category->id]) }}" method="POST">
		                {{csrf_field()}}
		                <div class="card-body">
			                <div class="form-group">
		                        <label for="title">Name</label>
		                        <input 
		                            type="text"
		                            class="form-control" 
		                            name="name"  
		                            placeholder="Enter User Name"
		                            value="{{$category->name}}">
		                    </div>
			                <div class="form-group">
		                        <label for="parent_id">Category Type</label>
			                    <select name="parent_id" class="form-control">
							    	{{-- Check category_id [ Parent Or Child]--}}
							        <option value="{{NULL}}">Parent</option>
								    @foreach($categories as $cats)
								        <option value="{{$cats->id}}">{{$cats->name}}</option>
								    @endforeach
							    </select>
		                    </div>
		                <button type="submit" class="btn btn-primary">Update</button>
	              	</form>	
		    </div>
		</div>    
	</div>
</div>	
@endsection