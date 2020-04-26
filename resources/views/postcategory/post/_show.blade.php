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
				<div class="card-footer">
					<ul class="list-inline float-left">
						<li class="list-inline-item"><h5>{!! $post->belongstoaccount()->first()->c_sheadera !!}</h5></li>
					</ul>
					@auth
						@if($post->belongstoaccount->c_id == \Auth::user()->c_id || \Auth::user()->c_sheaderb == 1)
						<ul class="list-inline float-right">
							<li class="list-inline-item">
								<a href="{{ route('post.edit', $post->id) }}" class="float-right"><i class="far fa-edit"></i></a>
							</li>
							<li class="list-inline-item">
								<span class="float-right text-danger deletepost" data-id="{!! $post->id !!}" title="Delete"><i class="far fa-trash-alt"></i></span>
							</li>
						</ul>
						@endif
					@endauth
				</div>
			</div>
		</div>
	</div>

	@if( $post->first()->hasmanycomment()->get()->count() > 0 )
		@foreach( $post->hasmanycomment()->get() as $post )

			<div class="row">
				<div class="col-10 offset-2">
					<div class="card">
						<div class="card-header">
							<h3 class="text-capitalize float-left">RE: {{ $post->belongstopost()->first()->subject }}</h3>
							<h6 class="align-middle float-right">{{ \Carbon\Carbon::parse($post->created_at)->toDayDateTimeString() }}</h6>
						</div>
						<div class="card-body">
							{!! $post->comment !!}
						</div>
						<div class="card-footer">
							<ul class="list-inline float-left">
								<li class="list-inline-item">
									<h5>{!! $post->belongstoaccount()->first()->c_sheadera !!}</h5>
								</li>
							</ul>
							@auth
								@if($post->belongstoaccount->c_id == \Auth::user()->c_id || \Auth::user()->c_sheaderb == 1)
								<ul class="list-inline float-right">
									<li class="list-inline-item">
										<a href="{{ route('postComment.edit', $post->id) }}" class="float-right"><i class="far fa-edit"></i></a>
									</li>
									<li class="list-inline-item">
										<span class="text-danger float-right deletecomment" data-id="{!! $post->id !!}" title="Delete"><i class="far fa-trash-alt"></i></span>
									</li>
								</ul>
								@endif
							@endauth
						</div>
					</div>
				</div>
			</div>

		@endforeach
	@endif

</div>
@auth
	<div class="container">
		<div class="row">
			<div class="col-10 offset-2">
			<div class="card">
				<div class="card-header">
					<h3 class="float-left">Reply</h3>
				</div>
				<div class="card-body">
	
					{!! Form::open(['route' => ['postComment.store', 'post_id='.$post->id], 'id' => 'form', 'autocomplete' => 'off', 'files' => true]) !!}
	
					<div class="form-group row {{ $errors->has('post') ? ' has-error' : '' }}">
						{{ Form::label( 'comment', 'Comment : ', ['class' => 'col-2 col-form-label text-right'] ) }}
						<div class="col-10">
							{{ Form::textarea('comment', @$value, ['class' => 'form-control'.($errors->has('comment') ? ' is-invalid' : NULL), 'id' => 'postComment', 'placeholder' => 'Comment'], 'autofocus') }}
							@if ($errors->has('comment'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('comment') }}</strong>
							</span>
							@endif
						</div>
					</div>
					
					<div class="form-group row mb-0">
						<div class="col-8 offset-2">
							{!! Form::button('Submit', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
						</div>
					</div>
	
					{{ Form::close() }}
	
				</div>
			</div>
		</div>
		</div>
	</div>
@endauth