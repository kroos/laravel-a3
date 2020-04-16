<?php
$posting = App\Model\Post::where('category_id', 1);
?>

@if( $posting->get()->count() > 0 )
	@foreach( $posting->get() as $post)
		<div class="container">
			<div class="row">
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

			<div class="row">
				<div class="col-10 offset-2">
					<div class="card">
						<div class="card-header">
							<h3 class="text-capitalize float-left">RE: {{ $comment->belongstopost()->first()->subject }}</h3>
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

		</div>
		
	@endforeach
@else
<p class="text-center">No News yet.</p>
@endif





<p>&nbsp;</p>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-10">
			<div class="card">
				<div class="card-header">Create News Post</div>
				<div class="card-body">

					{{ Form::open(['route' => ['register'], 'id' => 'form', 'autocomplete' => 'off', 'files' => true, 'autocomplete' => 'off']) }}

						<div class="form-group row {{ $errors->has('subject') ? ' has-error' : '' }}">
							<label for="subject" class="col-2 col-form-label text-right">{{ __('Subject :') }}</label>

							<div class="col-10">
								<input id="subject" type="text" class="form-control{{ $errors->has('subject') ? ' is-invalid' : NULL }}" name="subject" value="{{ old('subject') }}" required autocomplete="subject" autofocus>

								@error('subject')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

<p>&nbsp;</p>
						<div class="form-group row {{ $errors->has('news') ? ' has-error' : '' }}">
							<label for="news" class="col-2 col-form-label text-md-right">{{ __('News Post :') }}</label>

							<div class="col-md-10">
								<textarea id="news" class="form-control {{ $errors->has('news') ? ' is-invalid' : NULL }}" name="news" value="{{ old('news') }}" required autocomplete="news"></textarea>
								@error('news')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<div class="col-10 offset-2">
								<button type="submit" class="btn btn-primary">
									{{ __('Post') }}
								</button>
							</div>
						</div>

					{{ Form::close() }}
				</div>
				<div class="card-footer">{{ \Auth::user()->c_sheadera }}</div>
			</div>
		</div>
	</div>
</div>