@extends('layouts.frontend-app')
{{-- @section('title', 'Home') --}}
@section('content')
	@include('front-end.single_page.breadcrumb')
	<!-- Content -->
	<section class="bg0 p-b-140 p-t-10">
		<div class="container">
			<div class="row justify-content-center">
				@include('front-end.single_page.post')
				@include('front-end.single_page.sidebar')
			</div>
		</div>
	</section>		
@endsection