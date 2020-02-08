@extends('layouts.admin_panel')
@section('content')
<div class="container-fluid">
    <div class="row">
      	<div class="col">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                	<h3 class="card-title">Edit Profile</h3>
                </div>


                <form action="{{ Route('profile.update',['id' => $profile->id]) }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('post')}}
                	<div class="card-body">
		                <div class="row">
			                <div class="col-8">
			        <!-- NickName -->
				              	<div class="form-group">
					                <label>NickName :</label>
					                <div class="input-group">
					                  <div class="input-group-prepend">
					                    <span class="input-group-text">
					                    	<i class="fa fa-phone"></i>
					                    </span>
					                  </div>
					                  <input 
					                  	type="text"
					                  	name="nickname" 
					                  	class="form-control"
					                  	value="{{$profile->nickname}}">
					                </div>
				                </div>
				    <!-- Phone -->
				              	<div class="form-group">
					                <label>phone :</label>
					                <div class="input-group">
					                  <div class="input-group-prepend">
					                    <span class="input-group-text">
					                    	<i class="fa fa-phone"></i>
					                    </span>
					                  </div>
					                  <input 
					                  	type="text"
					                  	name="phone" 
					                  	class="form-control"
					                  	value="{{$profile->phone}}">
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
					                  	name="adress" 
					                  	class="form-control"
					                  	value="{{$profile->adress}}">
					                </div>
				                </div>
					<!-- Description -->
				              	<div class="form-group">
					                <label>Description :</label>
					                <div class="input-group">
					                  <div class="input-group-prepend">
					                    <span class="input-group-text">
					                    	<i class="fa fa-map-marker"></i>
					                    </span>
					                  </div>
					                  <input 
					                  	type="text"
					                  	name="description" 
					                  	class="form-control"
					                  	value="{{$profile->description}}">
					                </div>
		                        </div>
					<!-- About -->
				              	<div class="form-group">
					                <label>About :</label>
					                <textarea 
		                                class="form-control" 
		                                name="about"
		                                rows="8">{{$profile->about}}</textarea>
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
					                  	name="facebook" 
					                  	class="form-control"
					                  	value="{{$profile->facebook}}">
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
					                  	name="twitter" 
					                  	class="form-control"
					                  	value="{{$profile->twitter}}">
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
					                  	name="instagram" 
					                  	class="form-control"
					                  	value="{{$profile->instagram}}">
					                </div>
				                </div>
					<!-- YouTube  -->
				              	<div class="form-group">
					                <label>YouTube :</label>
					                <div class="input-group">
					                  <div class="input-group-prepend">
					                    <span class="input-group-text">
					                    	<i class="fab fa-youtube"></i>
					                    </span>
					                  </div>
					                  <input 
					                  	type="text"
					                  	name="youtube" 
					                  	class="form-control"
					                  	value="{{$profile->youtube}}">
					                </div>
				                </div>
					<!-- Pinterest -->
				              	<div class="form-group">
					                <label>Pinterest :</label>
					                <div class="input-group">
					                  <div class="input-group-prepend">
					                    <span class="input-group-text">
					                    	<i class="fab fa-pinterest"></i>
					                    </span>
					                  </div>
					                  <input 
					                  	type="text"
					                  	name="pinterest" 
					                  	class="form-control"
					                  	value="{{$profile->pinterest}}">
					                </div>
				                </div>
					<!-- website -->
				              	<div class="form-group">
					                <label>Web Site :</label>
					                <div class="input-group">
					                  <div class="input-group-prepend">
					                    <span class="input-group-text">
					                    	<i class="fa fa-globe"></i>
					                    </span>
					                  </div>
					                  <input 
					                  	type="text"
					                  	name="website" 
					                  	class="form-control"
					                  	value="{{$profile->website}}">
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
					                  	name="github" 
					                  	class="form-control"
					                  	value="{{$profile->github}}">
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
					                  	name="linkedin" 
					                  	class="form-control"
					                  	value="{{$profile->linkedin}}">
					                </div>
				                </div>
			                </div>
			                <!-- End Col User Info-->
			    <!-- Start Col User Images -->
			                <div class="col-4">
			            <!-- User Avatar -->    	
			                    <div class="form-group">
			                        <label for="title">Avatar :</label>
			                        <div class="input-group">
						                <div class="custom-file">
						                    <input 
						                    	type="file" 
						                    	class="custom-file-input image_prev" 
						                    	name="avatar"
				                            	id="images">
						                    <label class="custom-file-label" for="images">Choose file</label>
						                </div>
						                <div class="input-group-append">
						                    <span class="input-group-text" id="">Upload</span>
						                </div>
					                </div>
			                    </div>
			                    <div class="form-group text-center">
			                        <img src="{{$profile->avatar_path }}" alt="" style="width: 190px; height: 200px" id="image_perview" class="img-thumbnail">
			                    </div>
						<!-- User Profile Cover -->
			                    <div class="form-group">
			                        <label for="title">Profile Cover :</label>
			                        <div class="input-group">
						                <div class="custom-file">
						                    <input 
						                    	type="file" 
						                    	class="custom-file-input image_prev" 
						                    	name="profilecover"
				                            	id="profilecover">
						                    <label class="custom-file-label" for="profilecover">Choose file</label>
						                </div>
						                <div class="input-group-append">
						                    <span class="input-group-text" id="">Upload</span>
						                </div>
					                </div>
			                    </div>
			                    <div class="form-group text-center">
			                        <img src="{{$profile->profilecover_path }}" alt="{{ $profile->nickname }}" style="width: 17rem; height: 9rem" id="profilecover_perview" class="img-thumbnail">
			                    </div>
					<!-- Button  -->
		                        <div class="box-footer">
			                        <button type="submit" class="btn btn-primary">Update</button>
			                    </div>   
		                    </div> 
				        </div><!-- End Row -->
					</div>
                </form>
            </div>
        </div>
	</div>
</div>
@endsection