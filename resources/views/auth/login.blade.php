@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header"><h1>{{ __('Login') }}</h1></div>

	<div class="card-body">

		@include('layouts.info')
		@include('layouts.errorform')

		<form method="POST" action="{{ route('login') }}" id="form" autocomplete="off" enctype="multipart/form-data" aria-label="{{ __('Login') }}">
			@csrf

			<div class="form-group row">
				<label for="username" class="col-sm-4 col-form-label text-md-right">{{ __('Username') }}</label>

				<div class="col-md-6">
					<input id="username" type="text" class="form-control{{ $errors->has('c_id') ? ' is-invalid' : '' }}" name="c_id" value="{{ old('c_id') }}"  autocomplete="off" autofocus>

					@if ($errors->has('c_id'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('c_id') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group row">
				<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

				<div class="col-md-6">
					<input id="password" type="password" class="form-control{{ $errors->has('c_headera') ? ' is-invalid' : '' }}" name="c_headera">

					@if ($errors->has('c_headera'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('c_headera') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group row">
				<div class="col-md-6 offset-md-4">
					<div class="form-check">

						<div class="pretty p-switch p-fill">
							<input class="form-check-input {{ $errors->has('remember') ? ' is-invalid' : '' }}" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} value="1">
							<div class="state">
								<label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
							</div>
							@if ($errors->has('remember'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('remember') }}</strong>
							</span>
							@endif
						</div>
					</div>
				</div>
			</div>

			<div class="form-group row mb-0">
				<div class="col-md-8 offset-md-4">
					<button type="submit" class="btn btn-primary btn-block">
						{{ __('Login') }}
					</button>

					<a class="btn btn-link" href="{{ route('password.request') }}">
						{{ __('Forgot Your Password?') }}
					</a>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection

@section('js')

/////////////////////////////////////////////////////////////////////////////////////////
// bootstrap validator

$("#form").bootstrapValidator({
	// feedbackIcons: {
	// 	valid: 'fas ',
	// 	invalid: 'fas ',
	// 	validating: 'fas '
	// },
	fields: {
		c_id: {
			validators: {
				notEmpty: {
					message: 'Please insert username. '
				},
				stringLength: {
					min: 8,
					message: 'The username should be greater than 8. '
				},
				regexp: {
					regexp: /^[a-zA-Z0-9_]+$/,
					message: 'The username can only consist of alphabetical, number and underscore'
				},
			}
		},
		c_headera: {
			validators: {
				notEmpty: {
					message: 'Please insert password. '
				},
				stringLength: {
					min: 8,
					message: 'The password should be greater than 8. '
				},
			}
		},
	}
})


/////////////////////////////////////////////////////////////////////////////////////////
@endsection