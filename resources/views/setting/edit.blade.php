@extends('layouts.admin_panel')
@section('content')
<div class="container-fluid">
	    <div class="row">
			<div class="col-12">
			 	<div class="tile">
			    	<h3 class="tile-title">WebSite Info</h3>
			    	{{--Check Have Permission Update Setting--}}
					@if (Auth::user()->hasPermission('update_setting'))
				    	@foreach($settings as $setting)
			                <form action="{{ Route('setting.update', ['id'=>$setting->id])}}" method="POST" enctype="multipart/form-data">
				                {{csrf_field()}}
				                <div class="card-body">
				                	<div class="row">
					                	<div class="col-8">
						    <!-- website Name -->
							              	<div class="form-group">
								                <label>WebSite Name :</label>
								                <div class="input-group">
									                <div class="input-group-prepend">
									                    <span class="input-group-text">
									                    	<i class="fa fa-phone"></i>
									                    </span>
									                </div>
								                	<input 
									                  	type="text"
									                  	name="website_name" 
									                  	class="form-control"
									                  	value="{{$setting->website_name}}">
								                </div>
							                </div>
							<!-- website Email -->
							              	<div class="form-group">
								                <label>WebSite E-Mail :</label>
									                <div class="input-group">
									                  <div class="input-group-prepend">
									                    <span class="input-group-text">
									                    	<i class="fa fa-phone"></i>
									                    </span>
									                </div>
									                <input 
									                  	type="email"
									                  	name="website_email" 
									                  	class="form-control"
									                  	value="{{$setting->website_email}}">
									            </div>
							                </div>
								<!-- Adress -->
							              	<div class="form-group">
								                <label>Adress :</label>
								                <div class="input-group">
								                  <div class="input-group-prepend">
								                    <span class="input-group-text">
								                    	<i class="fa fa-map-marker"></i>
								                    </span>
								                  </div>
								                  <input 
								                  	type="text"
								                  	name="website_adress" 
								                  	class="form-control"
								                  	value="{{$setting->website_adress}}">
								                </div>
							                </div>
					            <!-- Facebook -->
							              	<div class="form-group">
								                <label>Facebook :</label>
								                <div class="input-group">
								                  <div class="input-group-prepend">
								                    <span class="input-group-text">
								                    	<i class="fa fa-facebook"></i>
								                    </span>
								                  </div>
								                  <input 
								                  	type="text"
								                  	name="website_facebook" 
								                  	class="form-control"
								                  	value="{{$setting->website_facebook}}">
								                </div>
							                </div>
							        <!-- Twitter -->
							              	<div class="form-group">
								                <label>Twitter :</label>
								                <div class="input-group">
								                  <div class="input-group-prepend">
								                    <span class="input-group-text">
								                    	<i class="fa fa-twitter"></i>
								                    </span>
								                  </div>
								                  <input 
								                  	type="text"
								                  	name="website_twitter" 
								                  	class="form-control"
								                  	value="{{$setting->website_twitter}}">
								                </div>
							                </div>
							        <!-- Instagram -->
							              	<div class="form-group">
								                <label>Instagram :</label>
								                <div class="input-group">
								                  <div class="input-group-prepend">
								                    <span class="input-group-text">
								                    	<i class="fa fa-instagram"></i>
								                    </span>
								                  </div>
								                  <input 
								                  	type="text"
								                  	name="website_instagram" 
								                  	class="form-control"
								                  	value="{{$setting->website_instagram}}">
								                </div>
							                </div>
							                <!-- Instagram -->
							              	<div class="form-group">
								                <label>YouTube :</label>
								                <div class="input-group">
								                  <div class="input-group-prepend">
								                    <span class="input-group-text">
								                    	<i class="fa fa-youtube"></i>
								                    </span>
								                  </div>
								                  <input 
								                  	type="text"
								                  	name="website_youtube" 
								                  	class="form-control"
								                  	value="{{$setting->website_youtube}}">
								                </div>
							                </div>
							                <!-- Instagram -->
							              	<div class="form-group">
								                <label>Pinterest :</label>
								                <div class="input-group">
								                  <div class="input-group-prepend">
								                    <span class="input-group-text">
								                    	<i class="fa fa-pinterest"></i>
								                    </span>
								                  </div>
								                  <input 
								                  	type="text"
								                  	name="website_pinterest" 
								                  	class="form-control"
								                  	value="{{$setting->website_pinterest}}">
								                </div>
							                </div>
							        <!-- GitHub -->
							              	<div class="form-group">
								                <label>GitHub :</label>
								                <div class="input-group">
								                  <div class="input-group-prepend">
								                    <span class="input-group-text">
								                    	<i class="fa fa-github"></i>
								                    </span>
								                  </div>
								                  <input 
								                  	type="text"
								                  	name="website_github" 
								                  	class="form-control"
								                  	value="{{$setting->website_github}}">
								                </div>
							                </div>
							        <!-- Linkedin -->
							              	<div class="form-group">
								                <label>Linked-In :</label>
								                <div class="input-group">
								                  <div class="input-group-prepend">
								                    <span class="input-group-text">
								                    	<i class="fa fa-linkedin"></i>
								                    </span>
								                  </div>
								                  <input 
								                  	type="text"
								                  	name="website_linkedin" 
								                  	class="form-control"
								                  	value="{{$setting->website_linkedin}}">
								                </div>
							                </div>
						                </div>
					                    <div class="col-4">
						                    <!-- Description -->
							              	<div class="form-group">
								                <label>Description :</label>
								                <textarea 
					                                class="form-control" 
					                                name="website_description"
					                                rows="4">{{$setting->website_description}}</textarea>
					                        </div>
					                        <div class="form-group">
						                        <label for="title">Images :</label>
						                        <div class="input-group">
									                <div class="custom-file">
									                    <input 
									                    	type="file" 
									                    	class="custom-file-input image_prev" 
									                    	name="website_logo"
							                            	id="images">
									                    <label class="custom-file-label" for="images">Choose file</label>
									                </div>
									                <div class="input-group-append">
									                    <span class="input-group-text" id="">Upload</span>
									                </div>
								                </div>
					                    	</div>
						                    <div class="form-group text-center">
						                        <img src="{{$setting->logo_path }}" alt="" style="width: 190px; height: 200px" id="image_perview" class="img-thumbnail">
						                    </div>
					                        <div class="box-footer">
						                        <button type="submit" class="btn btn-primary">Save Changes</button>
						                    </div>   
					                    </div> 
					                </div> 
				                </div>
				            </form>
				        @endforeach
				    @else    
				        <h4 class="btn btn-secondry"> You Don't Have Permission To Access This Page</h4>
				    @endif
			    </div>
			</div>
		</div>
</div>	
@endsection
