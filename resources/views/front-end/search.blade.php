@extends('layouts.frontend-app')
{{-- @section('title', 'Home') --}}
@section('content')
	@include('front-end.index-page.headline')
	<!-- Content -->
	<section class="bg0 p-b-55">
		<div class="container">
			<div class="row justify-content-center">
	<!-- Posts -->		
				<div class="col-md-10 col-lg-8 p-b-80">
					<div class="p-r-10 p-r-0-sr991">
						<div class="m-t--40 p-b-40">
							<!-- Item post -->
							@if ($posts->count() > 0)
								@foreach($posts as $post)
									<div class="flex-wr-sb-s p-t-40 p-b-15 how-bor2">
										<a href="blog-detail-02.html" class="size-w-8 wrap-pic-w hov1 trans-03 w-full-sr575 m-b-25">
											<img src="{{$post->photo_path}}" alt="IMG">
										</a>

										<div class="size-w-9 w-full-sr575 m-b-25">
											<h5 class="p-b-12">
												<a href="{{ Route('single.page', ['id'=> $post->id, 'slug'=> $post->slug]) }}" class="f1-l-1 cl2 hov-cl10 trans-03 respon2">
													{{ $post->title }} 
												</a>
											</h5>

											<div class="cl8 p-b-18">
												<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
													by {{ $post->user->name }}
												</a>

												<span class="f1-s-3 m-rl-3">
													-
												</span>

												<span class="f1-s-3">
													Feb 18
												</span>
											</div>

											<p class="f1-s-1 cl6 p-b-24">
												{{-- Show Post Content Without HTML Code & Length = 55 Cracter  --}}
												{!! Str::limit($post->content, 199, '') !!}
											</p>

											<a href="{{ Route('single.page', ['id'=> $post->id, 'slug'=> $post->slug]) }}" class="f1-s-1 cl9 hov-cl10 trans-03">
												Read More
												<i class="m-l-2 fa fa-long-arrow-alt-right"></i>
											</a>
										</div>
									</div>
								@endforeach
							@else
								<div class="flex-wr-sb-s p-t-40 p-b-15 how-bor2">
									<span> No Have Any Results </span>
								</div>
							@endif
						</div>
						<!-- Pagination -->
						{{ $posts->appends(request()->query())->links() }}
					</div>
				</div>
	<!-- SideBar -->		
					@include('front-end.single_page.sidebar')
				</div>
			</div>
		</div>
	</section>		
@endsection