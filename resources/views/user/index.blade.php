<?php
/**
 *** Function Get User Role Name
 */
function RolesNameColor($user){
	 $user_role_id = $user->roles()->first()->id; // Get Role ID And Make Chack
	 $user_role_name = $user->roles()->first()->name; // Get Role Name

	if ($user_role_id == 1 ) { 
		// Role Owner
		echo '<span class="btn btn-primary">'. $user_role_name .'</span>';
	} elseif ($user_role_id == 2) { 
		// Role SupeAdmin
		echo '<span class="btn btn-success">'. $user_role_name .'</span>';
	} elseif ($user_role_id == 3) { 
		// Role Admin
		echo '<span class="btn btn-warning">'. $user_role_name .'</span>';
	} elseif ($user_role_id == 4) { 
		// Role User
		echo '<span class="btn btn-info">'. $user_role_name .'</span>';
	} else {
		// Any New Role
		echo '<span class="btn btn-danger">'. $user_role_name .'</span>';
	}
}
?>

@extends('layouts.admin_panel')
@section('content')
<div class="col-12">
	<ul class="app-nav">
<!-- Serach User Box -->		
        <li class="app-search">
          <form action="{{ Route('admins') }}" method="get">
            <input class="app-search__input" type="search" name="search" placeholder="Search" value="{{ request()->search }}">
            <button class="app-search__button">
              <i class="fa fa-search"></i>
            </button>
          </form>
        </li>
    </ul>
  <div class="tile">
    <h3 class="tile-title">Admins</h3>
    <table class="table table-bordered table-hover">
      	<thead>
	        <tr>
	          	<th>#</th>
	          	<th>Name</th>
		      	<th>E-mail</th>
		      	<th>Role</th>
		      	<th>Status</th>
		    	<th>Action</th>
	        </tr>
	    </thead>
      	{{--Check If Have Users Or No--}}
		@if($users->count() > 0)
		    <tbody>
		    	{{--Get All User In DataBase--}}
               	@foreach($users as $index=>$user)
			        <tr>
			          	<td>{{$index + 1}}</td>
				        <td>{{ $user->name }}</td>
				        <td>{{ $user->email }}</td>
				        <td>{{ RolesNameColor($user) }} </td>
			          {{-- Cheak User Status Active Or Un-Activeted --}}
			          <td>
			          	{{--Check Have Permission Update User--}}
						@if (Auth::user()->hasPermission('update_users'))
				          	@if($user->status == 0){{-- User Status Activeted --}}
				          		<a href="{{ Route('admin.status', ['id' => $user->id]) }}">
					          		<button class="btn btn-success" >
					          			Activeted
					          		</button>
				          		</a>
				          	@elseif($user->status == 1)
				          		<a href="{{ Route('admin.status', ['id' => $user->id]) }}">
					          		<button class="btn btn-danger">
					          			Un-Active
					          		</button>
				          		</a>
				          	@endif
				        @else
					        <button class="btn btn-primary" disabled>
				          		<i class="fa fa-edit"></i> UnActiveted
				          	</button>
				        @endif  		
			          </td>
			          {{-- User Action Edit Or Delete --}}
			          <td>
			          	{{--Check Have Permission Edit User--}}
						@if (Auth::user()->hasPermission('update_users'))
				          	{{-- Edit User --}}
				          	<a href="{{Route('admin.edit', ['id'=>$user->id])}}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
				        @else
				        	<button class="btn btn-primary" disabled>
				          		<i class="fa fa-edit"></i> Edit
				          	</button>
			          	@endif
			          	{{-- Check Have Permission Delete User --}}
			          	@if (Auth::user()->hasPermission('delete_users'))
				          	{{-- Delete User --}}
				          	<a href="{{Route('admin.delete', ['id'=>$user->id])}}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
				        @else
				          	<button class="btn btn-danger" disabled>
				          		<i class="fa fa-trash"></i> Delete
				          	</button>
			          	@endif
			          </td>
			        </tr>
			    @endforeach{{-- End Loop --}}
		    </tbody>
		@else
            <div class="alert alert-warning" role="alert">
               <h3> No have Any<strong>Admin</strong> </h3>
            </div>
		@endif <!-- end Check -->     
    </table>
    {{ $users->appends(request()->query())->links() }}
  </div>
</div>
<div class="clearfix"></div>
@endsection