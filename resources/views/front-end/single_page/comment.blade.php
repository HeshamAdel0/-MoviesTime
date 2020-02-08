<!-- Leave a comment -->
<div>
	<h4>Display Comments</h4>
	{{-- Get Tha Comment Post & Replies --}}
    @include('front-end.single_page.comment_reply.comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
    <hr />
	<h4 class="f1-l-4 cl3 p-b-12">
		Leave a Comment
	</h4>

	<p class="f1-s-13 cl8 p-b-40">
		Your email address will not be published. Required fields are marked *
	</p>
	<!-- Comments -->
	<form method="post" action="{{ route('comment.add') }}">
		{{csrf_field()}}
	<!-- Comment Text -->
		<textarea 
			class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" 
			name="comment_body" 
			placeholder="Comment..."></textarea>
	<!-- User Name -->	
		<input 
			class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" 
			type="text" 
			name="name" 
			placeholder="Name*">	
	<!-- User Email -->		
		<input 
			class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" 
			type="email" 
			name="email" 
			placeholder="Email*">
		<input 
			type="hidden" 
			name="post_id" 
			value="{{ $post->id }}" >		
		<button class="size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-10">
			Post Comment
		</button>
	</form>
</div>
