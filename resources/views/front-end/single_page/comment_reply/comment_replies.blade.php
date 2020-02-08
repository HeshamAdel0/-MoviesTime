{{-- Show Lvl-1 Form Reply & Fetch Comment Whene parent_id = Null  --}}
@foreach($comments->where('parent_id', '=', Null) as $comment)
    <!-- Comments -->
    <div class="display-comment">
    <!-- User Name -->     
        <strong>{{ $comment->name }}</strong>
    <!-- Comment Text -->
        <p>{{ $comment->body }}</p>
        {{-- 
            *** Cheack IF This Reply Have Anthor Reply Or No
            *** IF Have A Reply Dont Show Reply Form
            *** IF Dont Have A Reply Show Reply Form
         --}}
        @if (!count($comment->replies))
            <a href="" id="reply"></a>
    <!-- Reply Form -->
            <form method="post" action="{{ route('reply.add') }}">
                {{csrf_field()}}
                <div class="form-group">
                <!-- User Name -->        
                    <input 
                        type="text" 
                        name="name" 
                        class="form-control col-3" 
                        placeholder="Your Name" 
                        style="display: inline-block;">
                <!-- User Email -->        
                    <input 
                        type="email" 
                        name="email" 
                        class="form-control col-3" 
                        placeholder="Your Email" 
                        style="display: inline-block;">
                <!-- Comment Text -->        
                    <input 
                        type="text" 
                        name="comment_body" 
                        class="form-control">       
                    <input 
                        type="hidden" 
                        name="post_id" 
                        value="{{ $post_id }}">       
                    <input 
                        type="hidden" 
                        name="comment_id" 
                        value="{{ $comment->id }}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-warning" value="Reply">
                </div>
            </form>   
        @endif
        {{-- Get Reply Lvl 2 IF Have --}}                
        @include('front-end.single_page.comment_reply.comment_repliesLv2', ['replies' => $comment->replies])
    </div>
@endforeach
