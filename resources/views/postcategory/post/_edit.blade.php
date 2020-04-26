<div class="form-group row {{ $errors->has('category_id') ? ' has-error' : '' }}">
	{{ Form::label( 'cat', 'Category : ', ['class' => 'col-4 col-form-label text-right'] ) }}
	<div class="col-6">
		{!! Form::select('category_id', \App\Model\PostCategory::all()->pluck('category', 'id')->toArray(), $post->belongstopostcategory->id, ['class' => 'form-control'.($errors->has('subject') ? ' is-invalid' : NULL), 'id' => 'cat', 'placeholder' => 'Please choose']) !!}
		@if ($errors->has('category_id'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('category_id') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group row {{ $errors->has('subject') ? ' has-error' : '' }}">
	{{ Form::label( 'pri', 'Subject : ', ['class' => 'col-4 col-form-label text-right'] ) }}
	<div class="col-6">
		{{ Form::text('subject', @$value, ['class' => 'form-control'.($errors->has('subject') ? ' is-invalid' : NULL), 'id' => 'pri', 'placeholder' => 'Subject'], 'autofocus') }}
		@if ($errors->has('subject'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('subject') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group row {{ $errors->has('post') ? ' has-error' : '' }}">
	{{ Form::label( 'postmessage', 'Post : ', ['class' => 'col-4 col-form-label text-right'] ) }}
	<div class="col-6">
		{{ Form::textarea('post', @$value, ['class' => 'form-control'.($errors->has('post') ? ' is-invalid' : NULL), 'id' => 'postmessage', 'placeholder' => 'Post'], 'autofocus') }}
		@if ($errors->has('post'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('post') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group row mb-0">
	<div class="col-8 offset-md-4">
		{!! Form::button('Submit', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
	</div>
</div>