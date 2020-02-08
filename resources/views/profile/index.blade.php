@extends('layouts.admin_panel')
@section('content')
<div class="row user">
	@foreach ($profiles as  $profile)
	    <div class="col-md-12">
	      <div class="profile">
	        <div class="info">
	        	{{-- Get The Admin Photo --}}
	        	<img class="user-img" src="{{$profile->avatar_path}}">
	          <h4>{{ $profile->nickname }}</h4>
	          <p>{{$profile->description}}</p>
	          <a href="{{Route('profile.edit', ['name'=> ucwords(str_replace(' ', '-', $profile->user->name)) ,'id'=>$profile->id])}}" class="btn btn-info">
	          	<i class="fa fa-edit"></i>
	          	Edit
	          </a>
	        </div>
	        {{-- Get The Admin Profile Cover --}}
	        <div class="cover-image" style="background-image: url({{$profile->profilecover_path}})"></div>
	      </div>
	    </div>
<!-- Start Tab Navbar -->
	    <div class="col-md-3">
	      <div class="tile p-0">
	        <ul class="nav flex-column nav-tabs user-tabs">
	          <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Timeline</a></li>
	          <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Info</a></li>
	        </ul>
	      </div>
	    </div>
	<!-- Start Tab User Timeline -->
	    <div class="col-md-9">
	      <div class="tab-content">
		        <div class="tab-pane active" id="user-timeline">
			        <div class="timeline-post">
			            <div class="post-media">
			            	<a href="#">
			            		<img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg">
			            	</a>
				              <div class="content">
				                <h5><a href="#">John Doe</a></h5>
				                <p class="text-muted"><small>2 January at 9:30</small></p>
				              </div>
			            </div>
			            <div class="post-content">
			              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,	quis tion ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			            </div>
			            <ul class="post-utility">
			              <li class="likes"><a href="#"><i class="fa fa-fw fa-lg fa-thumbs-o-up"></i>Like</a></li>
			              <li class="shares"><a href="#"><i class="fa fa-fw fa-lg fa-share"></i>Share</a></li>
			              <li class="comments"><i class="fa fa-fw fa-lg fa-comment-o"></i> 5 Comments</li>
			            </ul>
			        </div>
		          <div class="timeline-post">
		            <div class="post-media"><a href="#"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"></a>
		              <div class="content">
		                <h5><a href="#">John Doe</a></h5>
		                <p class="text-muted"><small>2 January at 9:30</small></p>
		              </div>
		            </div>
		            <div class="post-content">
		              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,	quis tion ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		            </div>
		            <ul class="post-utility">
		              <li class="likes"><a href="#"><i class="fa fa-fw fa-lg fa-thumbs-o-up"></i>Like</a></li>
		              <li class="shares"><a href="#"><i class="fa fa-fw fa-lg fa-share"></i>Share</a></li>
		              <li class="comments"><i class="fa fa-fw fa-lg fa-comment-o"></i> 5 Comments</li>
		            </ul>
		          </div>
		        </div>
		<!-- End Tab User Timeline -->
		<!-- Start Tab User Info -->       
		        <div class="tab-pane fade" id="user-settings">
			<!-- Info -->
			        <div class="timeline-post">
			        	<div class="user-settings">
		        			<h4 class="line-head">Info</h4>
				            <div class="row">
				    <!-- User Name -->
				              	<div class="col-md-8 mb-4">
				              		<label>Name :</label>
				              		 <input
					                  	type="text"
					                  	name="name"
					                  	class="form-control"
					                  	value="{{$profile->user->name}}" readonly>
				                </div>
				    <!-- User NickName -->
				                <div class="col-md-8 mb-4">
				              		<label>NickName :</label>
				              		 <input
					                  	type="text"
					                  	class="form-control"
					                  	value="{{$profile->nickname}}" readonly>
				                </div>
				    <!-- User E-mail -->
				                <div class="col-md-8 mb-4">
				              		<label>E-mail :</label>
				              		 <input
					                  	type="text"
					                  	class="form-control"
					                  	value="{{$profile->user->email}}" readonly>
				                </div>
			                </div>
		                </div>
			        </div>
		<!-- About ME -->
			        <div class="timeline-post">
			        	<div class="user-settings">
		        			<h4 class="line-head">About</h4>
				            <div class="row">
				              	<div class="col-md-8 mb-4">
				    <!-- User Phone -->          		
				              		<strong>
			  							<i class="fas fa-phone-alt mr-1"></i> Phone
				  					</strong>
									<p class="text-muted">{{$profile->phone}}</p>
									<hr>
					<!-- User Adress -->
									<strong>
										<i class="fas fa-map-marker-alt mr-1"></i> Location
									</strong>
									<p class="text-muted">{{$profile->adress}}</p>
					                <hr>
					<!-- User About -->
					                <strong>
					                	<i class="far fa-file-alt mr-1"></i> About Me
					                </strong>
					                <p class="text-muted">{{$profile->about}}</p>
				                </div>
			                </div>
		                </div>
			        </div>
		<!-- Contact Me -->
					<div class="timeline-post">
			        	<div class="user-settings">
		        			<h4 class="line-head">Contact Me</h4>
				            <div class="row">
			<!-- User Social link  -->
				              	<div class="col-md-8 mb-4 social">
				    <!-- Facebook Link  -->
				              		<a href="https://www.facebook.com/{{$profile->facebook}}" class="btn btn-social-icon btn-facebook" target="blank"><i class="fa fa-facebook-f"></i></a>
				    <!-- Twitter Link  -->          			
					                <a href="https://twitter.com/{{$profile->twitter}}" class="btn btn-social-icon btn-twitter" target="blank"><i class="fa fa-twitter"></i></a>

					<!-- Facebook Link  -->    
					                <a href="https://www.instagram.com/{{$profile->instagram}}" class="btn btn-social-icon btn-instagram" target="blank"><i class="fa fa-instagram"></i></a>
					<!-- Youtube Link  -->
					                <a href="https://www.youtube.com/channel/{{$profile->youtube}}" class="btn btn-social-icon btn-youtube" target="blank"><i class="fa fa-youtube"></i></a>
					<!-- Pinterest Link  -->
					                <a href="https://www.pinterest.com/{{$profile->pinterest}}" class="btn btn-social-icon btn-pinterest" target="blank"><i class="fa fa-pinterest"></i></a>
					<!-- GgitHub Link  -->
					                <a href="https://github.com/{{$profile->github}}" class="btn btn-social-icon btn-github" target="blank"><i class="fa fa-github"></i></a>
					<!-- Linked-in Link  -->
					                <a href="https://www.linkedin.com/in/{{$profile->linkedin}}" class="btn btn-social-icon btn-linkedin" target="blank"><i class="fa fa-linkedin"></i></a>
					<!-- Website Link  -->
					                <a href="{{$profile->website}}" class="btn btn-social-icon btn-website" target="blank"><i class="fa fa-globe"></i></a>
				              	</div>
				            </div>
		                </div>
			        </div>
		        </div>
		    <!-- Endt Tab User Info -->
	        </div>
	    </div>
	@endforeach
</div>
<style>
.edit{
	float: right;
    top: 0;
    bottom: -44px;
    background: #fff;
    border-radius: 5px;
    margin-right: -12px;
    margin-top: 23px;
}
.edit a{
	padding: 2px;
}
.social .btn .fa {
	font-size: 25px;
    line-height: 1.8;
}
.social .btn:not([disabled]):not(.disabled):not(.btn-link):hover, .btn:not([disabled]):not(.disabled):not(.btn-link):focus {
  color: #fff;
}
</style>
@endsection