<div class="form-group row {{ $errors->has('c_sheadera') ? ' has-error' : '' }}">
	{{ Form::label( 'pri', 'Name : ', ['class' => 'col-4 col-form-label text-right'] ) }}
	<div class="col-6">
		{{ Form::text('c_sheadera', @$value, ['class' => 'form-control'.($errors->has('c_sheadera') ? ' is-invalid' : NULL), 'id' => 'pri', 'placeholder' => 'Name'], 'autofocus') }}
		@if ($errors->has('c_sheadera'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('c_sheadera') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group row {{ $errors->has('c_headerb') ? ' has-error' : '' }}">
	{{ Form::label( 'email', 'Email Address : ', ['class' => 'col-4 col-form-label text-right'] ) }}
	<div class="col-6">
		{{ Form::text('c_headerb', @$value, ['class' => 'form-control'.($errors->has('c_headerb') ? ' is-invalid' : NULL), 'id' => 'email', 'placeholder' => 'Email Address']) }}
		@if ($errors->has('c_headerb'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('c_headerb') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group row {{ $errors->has('curr_c_headera') ? ' has-error' : '' }}">
	{{ Form::label( 'pri1', 'Current Password : ', ['class' => 'col-4 col-form-label text-right'] ) }}
	<div class="col-6">
		{{ Form::password('curr_c_headera', ['class' => 'form-control'.($errors->has('curr_c_headera') ? ' is-invalid' : NULL), 'id' => 'pri1', 'placeholder' => 'Current Password', 'aria-describedby' => 'passwordHelpBlock', 'autofocus']) }}
		<small id="passwordHelpBlock" class="form-text text-muted ">
			If you do not wish to change your password, just leave this input.
		</small>
		@if ($errors->has('curr_c_headera'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('curr_c_headera') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group row {{ $errors->has('c_headera') ? ' has-error' : '' }}">
	{{ Form::label( 'pri2', 'New Password : ', ['class' => 'col-4 col-form-label text-right'] ) }}
	<div class="col-6">
		{{ Form::password('c_headera', ['class' => 'form-control'.($errors->has('c_headera') ? ' is-invalid' : NULL), 'id' => 'pri2', 'placeholder' => 'New Password', 'autofocus']) }}
		@if ($errors->has('c_headera'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('c_headera') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group row {{ $errors->has('c_headera_confirmation') ? ' has-error' : '' }}">
	{{ Form::label( 'pri2', 'Confirm New Password : ', ['class' => 'col-4 col-form-label text-right'] ) }}
	<div class="col-6">
		{{ Form::password('c_headera_confirmation', ['class' => 'form-control'.($errors->has('c_headera_confirmation') ? ' is-invalid' : NULL), 'id' => 'pri2', 'placeholder' => 'Password Confirmation', 'autofocus']) }}
		@if ($errors->has('c_headera_confirmation'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('c_headera_confirmation') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group row mb-0">
	<div class="col-8 offset-md-4">
		{!! Form::button('Save', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
	</div>
</div>
