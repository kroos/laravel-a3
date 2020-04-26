@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>Hero Rebirth<h1>
	</div>
	<div class="card-body">
	@include('layouts.info')
	@include('layouts.errorform')

	{!! Form::model($hero_rebirth, ['route' => ['herorebirth.update', $hero_rebirth->c_id], 'method' => 'PATCH', 'id' => 'form', 'files' => true]) !!}


	<h6 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">For you to become stronger and stronger, i strongly recommend you to use this page</h6>

	<table class="table table-sm table-hover">
		<thead>
			<tr>
				<th scope="col">Rebirth</th>
				<th scope="col">Character Level</th>
				<th scope="col">Wz Needed</th>
			</tr>
		</thead>
		<tbody>
		@for ($i = config('a3.rebirthlevel'); $i <= 165; $i++)
		<?php
			$rbirth = $i - config('a3.rebirthlevel') + 1;
			$rbirthwz = config('a3.rebirthwz') * ($rbirth - 1);
		?>
			<tr><th scope="row">{{ $rbirth }}</th>
			<td>{{ $i }}</td>
			<td>{{ $rbirthwz }} Wz</td></tr>
		@endfor
		</tbody>
	</table>


		@if($hero_rebirth->hasmanycharac()->where('c_status', 'A')->count() > 0)

			<fieldset class="form-group {{ $errors->has('c_id') ? ' has-error' : '' }}">
				<div class="row">
					<legend class="col-form-label col-4 pt-0 text-right">Hero :</legend>
					<div class="col-6">
					@foreach($hero_rebirth->hasmanycharac()->where('c_status', 'A')->get() as $char)
						<div class="form-check">
							<input class="form-check-input {{ $errors->has('c_id') ? ' is-invalid' : NULL }}" type="radio" name="c_id" id="char.{{ $char->c_id }}" value="{{ $char->c_id }}" {{ old($char->c_id)?'checked':NULL }}>
								<label class="form-check-label" for="char.{{ $char->c_id }}">{{ $char->c_id }}</label>
								@if ($errors->has('c_id'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('c_id') }}</strong>
								</span>
								@endif
						</div>
					@endforeach
					</div>
				</div>
			</fieldset>

			<div class="form-group row mb-0">
				<div class="col-8 offset-4">
					{!! Form::button('Submit', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
				</div>
			</div>
		@else
		<p>Please create a character.</p>
		@endif

	{{ Form::close() }}

	</div>
</div>
@endsection

@section('js')
////////////////////////////////////////////////////////////////////////////////////
// select 2
$('#cat').select2({
	placeholder: 'Please choose',
	allowClear: true,
	closeOnSelect: true,
	width: '100%',
});

////////////////////////////////////////////////////////////////////////////////////
// form validator
	$('#form').bootstrapValidator({
			feedbackIcons: {
			valid: '',
			invalid: '',
			validating: ''
		},
		fields: {
			c_id: {
				validators: {
					notEmpty: {
						message: 'This cannot be empty!'
					},
				}
			},
		}
//	})
//	.find('[name="post"]')
//	.ckeditor()
//	.editor
//	// To use the 'change' event, use CKEditor 4.2 or later
//	.on('change', function(e) {
//		// Revalidate the bio field
//		$('#form').bootstrapValidator('revalidateField', 'post');
//		// console.log( $('#postmessage').val() );
	});

////////////////////////////////////////////////////////////////////////////////////
@endsection