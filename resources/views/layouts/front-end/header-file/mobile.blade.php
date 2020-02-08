<!-- Header Mobile -->
<div class="wrap-header-mobile">
	<!-- Logo moblie -->		
	<div class="logo-mobile">
		<a href="{{Route('home')}}">
			@foreach ($settings as $setting)
                <img src="{{ $setting->logo_path }}" alt="{{$setting->website_name}}">
            @endforeach
		</a>
	</div>

	<!-- Button show menu -->
	<div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
		<span class="hamburger-box">
			<span class="hamburger-inner"></span>
		</span>
	</div>
</div>