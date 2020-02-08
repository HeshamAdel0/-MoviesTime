@extends('layouts.admin_panel')
@section('content')
<div class="col-md">
    <div class="card card-primary">
        <div class="card-header">
        	<h3 class="card-title">Edit Admin [ {{$user->name}} ]</h3>
        </div>
<!-- form start -->
        <form action="{{ Route('admin.update', ['id'=>$user->id]) }}" method="POST">
            {{csrf_field()}}
            {{method_field('post')}}
            <div class="card-body">
{{-- Name --}}
                <div class="form-group">
                    <label for="title">Name</label>
                    <input 
                        type="text"
                        class="form-control" 
                        name="name"  
                        placeholder="Enter User Name"
                        value="{{$user->name}}">
                </div>
{{-- Email --}}
                <div class="form-group">
                    <label for="title">Email</label>
                    <input 
                        type="email"
                        class="form-control" 
                        name="email"  
                        placeholder="Enter User Email"
                        value="{{$user->email}}">
                </div>
{{-- Roles &  Permissions --}}
		        <div class="row">
			        <div class="col-6">
			{{-- Get All Roles --}}
			        	<div class="form-group">
		                	@foreach ($roles as $role)
		                	<div class="animated-radio-button">
					            <label>
					                <input 
					                	type="radio"
					                	name="role[]"
		                                id="{{$role->name}}"
		                                value="{{$role->id}}"
		                                {{-- Check If Have This Permission Or No--}}
			                                {{$user->hasRole($role->name) ? 'checked' : ''}}>
					                	<span class="label-text">{{$role->display_name}}</span>
					            </label>
				            </div>  
		                    @endforeach
	                	</div>	
			        </div>    
					<div class="col-6">
			{{-- Get All Permissions --}}
		                <div class="form-group">
		                	@foreach ($permissions as $perm)
		                	<div class="animated-checkbox">
					            <label>
					                <input 
					                	type="checkbox"
					                	name="permissions[]"
		                                id="{{$perm->name}}"
		                                value="{{$perm->id}}"
		                                {{-- Check If Have This Permission Or No--}}
			                                {{$user->hasPermission($perm->name) ? 'checked' : ''}}>
					                	<span class="label-text">{{$perm->display_name}}</span>
					            </label>
				            </div>  
		                    @endforeach
		                </div>
		            </div>
	            </div>
	        </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
      	</form>
    </div>
</div>
@endsection