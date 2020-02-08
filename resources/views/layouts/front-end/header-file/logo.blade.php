<div class="wrap-logo container">
	<!-- Logo desktop -->		
	<div class="logo">
		<a href="{{Route('home')}}">
			@foreach ($settings as $setting)
                <img src="{{ $setting->logo_path }}" alt="{{$setting->website_name}}">
            @endforeach
		</a>
	</div>	

	<!-- Banner -->
	<div class="banner-header">
		<a href="#"><img src="images/banner-01.jpg" alt="IMG"></a>
	</div>
</div>