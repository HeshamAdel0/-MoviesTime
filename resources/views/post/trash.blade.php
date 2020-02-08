@extends('layouts.admin_panel')
@section('content')
<div class="container-fluid">
    <div class="row">
		<div class="col-12">
		 	<div class="tile">
		    	<h3 class="tile-title">Post Trash</h3>
		    	<table class="table table-bordered table-hover">
		      	<thead>
			        <tr>
			          	<th>#</th>
			            <th>Image</th>
			            <th>Title</th>
			            <th>Auther</th>
			            <th>Categories</th>
			            <th>Action</th>
			        </tr>
			    </thead>
		      	{{--Check If Have Post Or No--}}
				@if($posts->count() > 0)
				    <tbody>
				    	{{--Get All Post In DataBase--}}
		               	@foreach($posts as $index=>$post)
					        <tr>
					          	<td>{{$index +1}}</td>
					          	<!-- Post Image -->
						        <td>
						        	<img src="{{($post->photo_path) }}" alt="{{$post->title}}" style="width: 60px; height: 60px" class="img-thumbnail">
						        </td>
						        <!-- Post Title -->
						        <td>{{$post->title}}</td>
						        <!-- Post Auther -->
						        <td>{{$post->user->name}}</td>
						        <!-- Post Categories -->
					          	<td>{{$post->category->name}}</td>
					          	<!-- Post Action -->
					          	<td>
					          		<a href="{{Route('post.restore', ['id'=>$post->id])}}" class="btn btn-primary">
					          			<i class="fa fa-edit"></i> Restory
					          		</a>

								    <a href="{{Route('post.harddelete', ['id'=>$post->id])}}" class="btn btn-danger">
								       <i class="fa fa-trash"></i> Delete
								   </a>
					          	</td>
					        </tr>
					    @endforeach{{-- End Loop --}}
				    </tbody>
				@else
		            <div class="alert alert-warning" role="alert">
		               <h4> No have Any <strong> Post</strong> </h4>
		            </div>
				@endif <!-- end Check -->     
		    </table>
		    </div>
		</div>    
	</div>
</div>	
@endsection