<?php
$posting = App\Model\Post::where('category_id', 1);
?>

@if( $posting->get()->count() > 0 )
	@foreach( $posting->get() as $post)
		<div class="container">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="text-capitalize float-left">{{ $post->subject }}</h3>
						<h6 class="align-middle float-right">{{ \Carbon\Carbon::parse($post->created_at)->toDayDateTimeString() }}</h6>
					</div>
					<div class="card-body">
						{!! $post->post !!}
					</div>
					<div class="card-footer"><h5>{!! $post->belongstoaccount()->first()->c_sheadera !!}</h5></div>
				</div>
			</div>
		</div>
		
		@if( $posting->first()->hasmanycomment()->get()->count() > 0 )
			@foreach( $posting->first()->hasmanycomment()->get() as $comment )

		<div class="container">
			<div class="col-10 float-right">
				<div class="card">
					<div class="card-header">
						<h6 class="align-middle float-right">{{ \Carbon\Carbon::parse($comment->created_at)->toDayDateTimeString() }}</h6>
					</div>
					<div class="card-body">
						{!! $comment->comment !!}
					</div>
					<div class="card-footer"><h5>{!! $comment->belongstoaccount()->first()->c_sheadera !!}</h5></div>
				</div>
			</div>
		</div>
			@endforeach
		@endif

	@endforeach
@else
<p class="text-center">No News yet.</p>
@endif