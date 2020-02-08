@extends('layouts.admin_panel')
@section('content')
<div class="container-fluid">
	<h3 class="tile-title">Dashboard</h3>
	<div class="row">
<!-- admin card -->
    	<div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon">
          	<i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Admins</h4>
              <p><b>{{$user}}</b></p>
            </div>
          </div>
        </div>
<!-- post card -->
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon">
          	<i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Post</h4>
              <p><b>{{$post}}</b></p>
            </div>
          </div>
        </div>
<!-- category card -->
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon">
          	<i class="icon fa fa-paperclip fa-3x"></i>
            <div class="info">
              <h4>Category</h4>
              <p><b>{{$category}}</b></p>
            </div>
          </div>
        </div>
<!-- tag card -->
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon">
          	<i class="icon fa fa-tags fa-3x"></i>
            <div class="info">
              <h4>Tags</h4>
              <p><b>{{$tag}}</b></p>
            </div>
          </div>
    	</div>
    </div>
</div>	
@endsection