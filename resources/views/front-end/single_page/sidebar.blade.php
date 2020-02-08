<!-- Sidebar -->
<div class="col-md-10 col-lg-4 p-b-30">
	<div class="p-l-10 p-rl-0-sr991 p-t-70">						
	<!-- Category -->
		<div class="p-b-60">
			<div class="how2 how2-cl4 flex-s-c">
				<h3 class="f1-m-2 cl3 tab01-title">
					Category
				</h3>
			</div>
			<ul class="p-t-35">
				{{-- Get All Categories & Count Just Puplished Post In This Category  --}}
				@foreach ($allcategories as $category)
					<li class="how-bor3 p-rl-4">
						<a href="#" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
							{{ $category->name }}
							<span>{{$category->posts()->where('status', '=', 0)->count()}}</span>
						</a>
					</li>
				@endforeach
			</ul>
		</div>
    <!-- Archive -->
		<div class="p-b-37">
			<div class="how2 how2-cl4 flex-s-c">
				<h3 class="f1-m-2 cl3 tab01-title">
					Popular Post Comment
				</h3>
			</div>
			<ul class="p-t-32">
				@foreach( $post_comment as $post)
					<li class="p-rl-4 p-b-19">
						<a href="{{ Route('single.page', ['id'=> $post->id, 'slug'=> $post->slug]) }}" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
							<span>
								{{$post->title}}
							</span>
							<span>
								{{-- Show PopularPost With Count Comment In Post Where commentable_id = Post->ID  --}}
								({{ $post->comments_count }})
							</span>
						</a>
					</li>
				@endforeach
			</ul>
		</div>

		<!-- Popular Posts -->
		<div class="p-b-30">
			<div class="how2 how2-cl4 flex-s-c">
				<h3 class="f1-m-2 cl3 tab01-title">
					Popular Post Views
				</h3>
			</div>

			<ul class="p-t-35">
				{{-- show Popular Post --}}
				@foreach( $popularpost as $post)
					<li class="flex-wr-sb-s p-b-30">
						<a href="{{ Route('single.page', ['id'=> $post->id, 'slug'=> $post->slug]) }}" class="size-w-10 wrap-pic-w hov1 trans-03">
							<img src="{{$post->photo_path}}" alt="{{$post->title}}">
						</a>

						<div class="size-w-11">
							<h6 class="p-b-4">
								<a href="{{ Route('single.page', ['id'=> $post->id, 'slug'=> $post->slug]) }}" class="f1-s-5 cl3 hov-cl10 trans-03">
									{{$post->title}}
								</a>
							</h6>

							<span class="cl8 txt-center p-b-24">
								<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
									{{-- show Just 1 Category Name IF Post Have More Than Categories --}}
									@foreach($post->category->take(1) as $category)
										{{$category->name}}
									@endforeach
								</a>

								<span class="f1-s-3 m-rl-3">
									-
								</span>

								<span class="f1-s-3">
									{{$post->created_at->toFormattedDateString()}}
								</span>
							</span>
						</div>
					</li>
				@endforeach
			</ul>
		</div>

		<!-- Tag -->
		<div>
			<div class="how2 how2-cl4 flex-s-c m-b-30">
				<h3 class="f1-m-2 cl3 tab01-title">
					Tags
				</h3>
			</div>

			<div class="flex-wr-s-s m-rl--5">
				{{-- show 20 Tags From All In The WebSite --}}
				@foreach ($tags->take(20) as $tag)
					<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
						{{ $tag->name }}
					</a>
				@endforeach
			</div>	
		</div>
	</div>
</div>