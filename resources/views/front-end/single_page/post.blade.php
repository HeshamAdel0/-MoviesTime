<div class="col-md-10 col-lg-8 p-b-30">
	<div class="p-r-10 p-r-0-sr991">
	<!-- Blog Detail -->
		{{-- Show Post Detail --}}
		@foreach($singelpost as $post)
			<div class="p-b-70">
				<a href="#" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
					{{-- show Just 1 Category Name IF Post Have More Than Categories --}}
					@foreach($post->category->take(1) as $category)
						{{ $category->name }}
					@endforeach
				</a>

				<h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
					{{ $post->title }}
				</h3>
				
				<div class="flex-wr-s-s p-b-40">
					<span class="f1-s-3 cl8 m-r-15">
						<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
								{{-- Get The Auther Name Write Post --}}
							by {{ $post->user->name }}
						</a>

						<span class="m-rl-3">-</span>
						<span>
							{{-- Show Time Add Post Like (  10day Ago  ) --}}
							{{$post->created_at->since()}}
						</span>
					</span>
					<span class="f1-s-3 cl8 m-r-15">
						{{-- Get View Count & Add +1 Get Real Number In DataBase --}}
						{{ $post->view_count+1 }} Views
					</span>

					<a href="#" class="f1-s-3 cl8 hov-cl10 trans-03 m-r-15">
						{{ $comment->where('commentable_id', '=', $post->id)->count() }}	Comments
					</a>
				</div>

				<div class="wrap-pic-max-w p-b-30">
					<img src="{{ $post->photo_path }}" alt="{{ $post->title }}">
				</div>

				<p class="f1-s-11 cl6 p-b-25">
					{{-- Show Post Content Without HTML Code  --}}
					{!! $post->content !!}
				</p>
				<!-- Tag -->
				<div class="flex-s-s p-t-12 p-b-15">
					<span class="f1-s-12 cl5 m-r-8">
						Tags:
					</span>
					
					<div class="flex-wr-s-s size-w-0">
						@foreach ($tags as $tag)
							<a href="#" class="f1-s-12 cl8 hov-link1 m-r-15">
								{{ $tag->name }}
							</a>
						@endforeach
					</div>
				</div>

				<!-- Share -->
				<div class="flex-s-s">
					<span class="f1-s-12 cl5 p-t-1 m-r-15">
						Share:
					</span>
					
					<div class="flex-wr-s-s size-w-0">
						<a href="#" class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
							<i class="fab fa-facebook-f m-r-7"></i>
							Facebook
						</a>

						<a href="#" class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
							<i class="fab fa-twitter m-r-7"></i>
							Twitter
						</a>

						<a href="#" class="dis-block f1-s-13 cl0 bg-google borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
							<i class="fab fa-google-plus-g m-r-7"></i>
							Google+
						</a>

						<a href="#" class="dis-block f1-s-13 cl0 bg-pinterest borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
							<i class="fab fa-pinterest-p m-r-7"></i>
							Pinterest
						</a>
					</div>
				</div>
			</div>
		@endforeach
		{{-- Comment --}}
		@include('front-end.single_page.comment')
	</div>
</div>