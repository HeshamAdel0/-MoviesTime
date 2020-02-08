{{-- @php $page_title = 'Home'; @endphp --}}
@extends('layouts.frontend-app')
{{-- @section('title', 'Home') --}}
@section('content')
	@include('front-end.index-page.headline')
	@include('front-end.index-page.feature')
	<div class="clearfix p-3"></div>
	@include('front-end.index-page.banner')
	@include('front-end.index-page.latest')
@endsection