@extends('layouts.admin_panel')
@section('content')
<div class="container-fluid">
    <div class="row">
		<div class="col-12">
		 	<div class="tile">
		    	<h3 class="tile-title">Create Post</h3>
		    	<form action="{{ Route('post.store') }}" method="POST" enctype="multipart/form-data">
	                {{csrf_field()}}
	                {{method_field('post')}}
	                <div class="card-body">
	                	<div class="row">
		                	<div class="col-12">
		                        <div class="form-group">
		        {{-- Title --}}
	                                <label for="title">Title</label>
	                                <input 
	                                    type="text" 
	                                    class="form-control" 
	                                    name="title"  
	                                    placeholder="Enter Post Title"
	                                    value="{{ old('title') }}">
		                        </div>
		        {{-- Content --}}         
		                        <div class="form-group">
		                            <label for="content">Conetent</label>
		                            <textarea 
		                                class="form-control ckeditor" 
		                                name="content" 
		                                rows="20"
		                                placeholder="Enter Post Conetent">{{ old('content') }}</textarea>
		                        </div>
		        {{-- Excerpt --}}
		                        <div class="form-group">
		                            <label for="excerpt">Excerpt Length</label>
		                            <textarea 
		                                class="form-control ckeditor" 
		                                name="excerpt"
		                                rows="6"
		                                placeholder="Enter Post Excerpt">{{ old('excerpt') }}</textarea>
		                        </div>
		                    </div>
		        		</div>
		                <div class="row">
		                    <div class="col-12">
		        {{-- Category --}}
		        				<label for="categories[]">Categories :</label>
		                        <div class="form-group">
			                    	@foreach ($categories as $categgory)
				                        <div class="custom-control custom-checkbox col-2" style="display: inline-block;">
					                        <input 
					                          	class="custom-control-input" 
					                          	type="checkbox" 
					                          	name="categories[]"
					                          	id="{{$categgory->name}}" 
				                                value="{{$categgory->id}}">
					                        <label
						                        for="{{$categgory->name}}"
						                        class="custom-control-label">
						                        {{$categgory->name}}
						                    </label>
				                        </div>
				                    @endforeach
			                    </div>
		        {{-- Tags --}}
		        				<label for="tags[]">Tags :</label>
			                    <div class="form-group">
			                    	@foreach ($tags as $tag)
				                        <div class="custom-control custom-checkbox col-2" style="display: inline-block;">
					                        <input 
					                          	class="custom-control-input" 
					                          	type="checkbox" 
					                          	name="tags[]"
					                          	id="tag_{{$tag->name}}" 
				                                value="{{$tag->id}}">
					                        <label
						                        for="tag_{{$tag->name}}"
						                        class="custom-control-label">
						                        {{$tag->name}}
						                    </label>
				                        </div>
				                    @endforeach
			                    </div>
		        {{-- Images --}}
		                        <div class="img-posts">
		                            <div class="img-buttons">
		                                <label for="title">Post Image</label>
		                                <input
		                                    type="file" 
		                                    name="photo"
		                                    id="images"
		                                    class="img-form image_prev">
		                            </div>
		                            <small class="text-muted">
									      Must Be Width 1024px or More Than This Width
									</small>
		                            <div class="form-group" style="width: 288px; height: 230px">
		                                <img src="{{asset('uploads/images/post_images/post_imag_default.jpg')}}" alt="" style="width: 100%; height: 100%" id="image_perview" class="img-thumbnail">
		                            </div>
		                        </div>
		                        <div class="box-footer">
			                        <button type="submit" class="btn btn-primary">Create</button>
			                    </div>   
		                    </div> 
		                </div> 
	                </div>
	            </form>
		    </div>
		</div>    
	</div>
</div>	
@endsection