<li class="mega-menu-item">
    <a href="#">
        {{$category->name}}
    </a>
    <div class="sub-mega-menu">
        <div class="nav flex-column nav-pills" role="tablist">
             <a class="nav-link active" data-toggle="pill" href="#{{$category->name}}" role="tab">
                All
            </a>
            {{-- 
                *** Loop To Get Sub-Category Slug Name
                *** And Make Coneact Tab With Sub-Category Slug Name 
            --}}
            @foreach($subcategories as $subcategory)
            <a class="nav-link" data-toggle="pill" href="#{{$subcategory->slug}}" role="tab">
                {{$subcategory->name}}
            </a>
            @endforeach
        </div>
        <div class="tab-content">
    <!-- Start Tab All-->
            <div class="tab-pane show active" id="{{$category->name}}" role="tabpanel">
                <div class="row">
                    {{-- Loop To Get Parent Category Posts --}}
                    @foreach($latest_posts as $lastpost)
                        @foreach($lastpost->category as $categories)
                            @if($category->id == $categories->id )
                                <div class="col-3">
                                    <!-- Item post -->
                                    <div>
                                        <a href="{{ Route('single.page', ['id'=> $lastpost->id, 'slug'=> $lastpost->slug]) }}" class="wrap-pic-w hov1 trans-03">
                                            <img src="{{$lastpost->photo_path}}" alt="{{$lastpost->title}}">
                                        </a>

                                        <div class="p-t-10">
                                            <h5 class="p-b-5">
                                                <a href="{{ Route('single.page', ['id'=> $lastpost->id, 'slug'=> $lastpost->slug]) }}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    {{$lastpost->title}}
                                                </a>
                                            </h5>

                                            <span class="cl8">
                                                <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                    {{$categories->name}}
                                                </a>

                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>

                                                <span class="f1-s-3">
                                                    {{$lastpost->created_at->toFormattedDateString()}}
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach{{-- End Loop --}}
                </div>
            </div>
    <!-- End Tab All-->
    <!-- Start Tab Sub-Category -->
            {{-- Loop To Get Sub-Category Slug Name --}}
            @foreach($subcategories as $subcategory)
                <div class="tab-pane" id="{{$subcategory->slug}}" role="tabpanel">
                    <div class="row">
                        {{-- Loop Show Posts --}}
                        @foreach($latest_posts as $lastpost)
                                {{-- Loop Show Posts With Category This Post --}}
                            @foreach($lastpost->category as $categories)
                                {{-- Make Cheak For Show Poste Have Just This Category ID --}}
                                @if($subcategory->id == $categories->id ) 
                                    <div class="col-3">
                            <!-- Item post -->
                                        <div>
                                            <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                                <img src="{{$lastpost->photo_path}}" alt="{{$lastpost->title}}">
                                            </a>

                                            <div class="p-t-10">
                                                <h5 class="p-b-5">
                                                    <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        {{$lastpost->title}}
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        {{$categories->name}}  
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        {{$lastpost->created_at->toFormattedDateString()}}
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endif    
                            @endforeach
                        @endforeach
                    </div>
                </div>
            @endforeach 
    <!-- End Tab Sub-Category -->   
        </div>
<!-- End Tab -->    
    </div>
</li>