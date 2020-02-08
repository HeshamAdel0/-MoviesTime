<!-- Breadcrumb -->
<div class="container">
	<div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
		<div class="f2-s-1 p-r-30 m-tb-6">
			<a href="index.html" class="breadcrumb-item f1-s-3 cl9">
				Home 
			</a>
			@foreach($breadcrumb as $category_name)
				{{-- show Just 1 Category Name IF Post Have More Than Categories --}}
				@foreach($category_name->category->take(1) as $category)
				<a href="blog-list-01.html" class="breadcrumb-item f1-s-3 cl9">
					{{ $category->name }}
				</a>
				@endforeach
			@endforeach 
			<span class="breadcrumb-item f1-s-3 cl9">
				@foreach($breadcrumb as $post)
					{{ $post->title }}
				@endforeach
			</span>
		</div>
		<form action="{{ Route('search') }}" method="get">
			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="search" name="search" value="{{ request()->search }}" placeholder="Search">
				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
					<i class="zmdi zmdi-search"></i>
				</button>
			</div>
		</form>
	</div>
</div>