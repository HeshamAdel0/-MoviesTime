<!-- Feature post -->
<section class="bg0">
	<div class="container">
		<div class="row m-rl--1">
			{{-- Get Post Details --}}
			@foreach($feature_post as $posts)
				<div class="col-sm-6 col-lg-4 p-rl-1 p-b-2">
					<div class="bg-img1 size-a-12 how1 pos-relative" style="background-image: url({{$posts->photo_path}});">
						<a href="blog-detail-01.html" class="dis-block how1-child1 trans-03"></a>

						<div class="flex-col-e-s s-full p-rl-25 p-tb-11">
							<a href="#" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
								{{-- show Just 1 Category Name IF Post Have More Than Categories --}}
								@foreach($posts->category->take(1) as $category)
									{{$category->name}}
								@endforeach
							</a>

							<h3 class="how1-child2 m-t-10">
								<a href="{{ Route('single.page', ['id'=> $posts->id, 'slug'=> $posts->slug]) }}" class="f1-m-1 cl0 hov-cl10 trans-03">
									{{$posts->title}}
								</a>
							</h3>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>