@extends('layouts.admin_panel')
@section('content')
<div class="container-fluid">
    <div class="row">
		<div class="col-12">
		 	<div class="tile">
		    	<h3 class="tile-title">Create Category</h3>
		    	<form action="{{ Route('category.store') }}" method="POST">
	                {{csrf_field()}}
	                <div class="card-body">
		                <div class="form-group">
	                        <label for="title">Name</label>
	                        <input 
	                            type="text"
	                            class="form-control" 
	                            name="name"  
	                            placeholder="Enter User Name"
	                            value="{{old('name')}}">
	                    </div>
		                <div class="form-group">
	                        <label for="parent_id">Category Type</label>
		                    <select name="parent_id" id="category_id" class="form-control">
						        <option value="">Parent</option>
						        @foreach($category as $cats)
						        	<option value="{{$cats->id}}">{{$cats->name}}</option>
						        @endforeach
					    	</select>
	                    </div>
	                <button type="submit" class="btn btn-primary">Create</button>
              	</form>
		    </div>
		</div>
	</div>	
@endsection