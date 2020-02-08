@extends('layouts.admin_panel')
@section('content')
<div class="container-fluid">
    <div class="row">
		<div class="col-12">
		 	<div class="tile">
		    	<h3 class="tile-title">Create Tag</h3>
		    	<form action="{{ Route('tag.store') }}" method="POST">
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
	                <button type="submit" class="btn btn-primary">Create</button>
              	</form>	
		    </div>
		</div>    
	</div>
</div>	
@endsection