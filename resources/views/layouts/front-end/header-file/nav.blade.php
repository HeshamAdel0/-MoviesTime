<div class="wrap-main-nav">
	<div class="main-nav">
		<!-- Menu desktop -->
		<nav class="menu-desktop">
			<a class="logo-stick" href="{{Route('home')}}">
				@foreach ($settings as $setting)
                	<img src="{{ $setting->logo_path }}" alt="{{$setting->website_name}}">
            	@endforeach
			</a>
    <!-- Nav Bar-->
			<ul class="main-menu">
				@foreach ($categories as $category)
                    {{-- Cheack If Have Category or Sub-Category --}}
                    @if(count($category->subcategory))
                        {{--If Have Sub-Category Will Show Sub-Category With Mega Menu --}}
                        @include('layouts.front-end.header-file.subCategory',['subcategories' => $category->subcategory])
                    @else
                        <li class="mega-menu-item">
                            <a href="#">
                                {{$category->name}}
                            </a>
                        </li>
                    @endif 
                @endforeach
			</ul>
		</nav>
	</div>
</div>