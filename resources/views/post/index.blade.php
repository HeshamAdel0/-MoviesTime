@extends('layouts.admin_panel')
@section('content')
<div class="container-fluid">
    <div class="row">
		<div class="col-12">
<!-- Serach Post Box -->
			<ul class="app-nav">
		        <li class="app-search">
		          <form action="{{ Route('posts') }}" method="get">
		            <input class="app-search__input" type="search" name="search" placeholder="Search" value="{{ request()->search }}">
		            <button class="app-search__button">
		              <i class="fa fa-search"></i>
		            </button>
		          </form>
		        </li>
		    </ul>
		 	<div class="tile">
		    	<h3 class="tile-title">Posts</h3>
		    	<table class="table table-bordered table-hover">
			      	<thead>
				        <tr>
				          	<th>#</th>
				            <th>Image</th>
				            <th>Title</th>
				            <th>Auther</th>
				            <th>Categories</th>
				            <th>Tags</th>
				            <th>Status</th>
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
						          	<td>
						          		@foreach($post->category as $categories)
				                    		<span class="badge badge-secondary">{{$categories->name}}</span>
				                    	@endforeach
						          	</td>
						          	<!-- Post Tags -->
						          	<th>
				                    	@foreach($post->tag as $tags)
				                    		<span class="badge badge-secondary">{{$tags->name}}</span>
				                    	@endforeach
				                    </th>
						          	<!-- Post Status -->
						          	<td>
						          		{{-- Check If User Have Permission Update Post OR no  --}}
						          		@if (Auth::user()->hasPermission('update_post'))
							          		{{-- Cheak Post Status Puplished Or UnPuplished --}}
							          		@if($post->status == 0){{-- Post Status Published --}}
								          		<a href="{{ Route('post.status', ['id' => $post->id]) }}">
									          		<button class="btn btn-success" >
									          			Puplished
									          		</button>
								          		</a>
								          	@elseif($post->status == 1)
								          		<a href="{{ Route('post.status', ['id' => $post->id]) }}">
									          		<button class="btn btn-danger">
									          			UnPuplished
									          		</button>
								          		</a>
								          	@endif
								        @else
								        	<button class="btn btn-primary" disabled> UnPuplished </button>	
								        @endif  	
						          	</td>
						          	<!-- Post Action -->
						          	<td>
						          		{{-- Check If User Have Permission Update Post OR no  --}}
						          		@if (Auth::user()->hasPermission('update_post'))
							          		<a href="{{Route('post.edit', ['id'=>$post->id, 'slug' => $post->slug])}}" class="btn btn-primary">
							          			<i class="fa fa-edit"></i> Edit
									        </a>
									    @else
								        	<button class="btn btn-primary" disabled>
								        		<i class="fa fa-edit"></i> Edit 
								        	</button>	
								        @endif  
								        {{-- Check If User Have Permission Delete Post OR no  --}}  
								        @if (Auth::user()->hasPermission('delete_post'))
									        <a href="{{Route('post.trashed', ['id'=>$post->id])}}" class="btn btn-warning">
									        	<i class="fa fa-trash"></i> Trash
									        </a>
									    @else
								        	<button class="btn btn-warning" disabled>
								        		<i class="fa fa-trash"></i> Trash 
								        	</button>	
								        @endif  
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
			    {{ $posts->appends(request()->query())->links() }}
		    </div>
		</div>    
	</div>
</div>	
@endsection