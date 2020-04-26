@if($postCategory->count())
	<div class="col-6 offset-3">
		<ul class="list-group">
		@foreach($postCategory->hasmanypost()->get() as $post)
			<li class="list-group-item d-flex justify-content-between align-items-center">
				<a href="{{ route('post.show', $post->id) }}" class="">{{ $post->subject }}</a>
				<span class="badge badge-primary badge-pill">{{ $post->hasmanycomment()->count() }}</span>	<!-- no reply -->
			</li>
		@endforeach
		</ul>
	</div>
@endif
