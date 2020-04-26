@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>Offline Town Portal<h1>
	</div>
	<div class="card-body">
	@include('layouts.info')
	@include('layouts.errorform')

	{!! Form::model($offline_town_portal, ['route' => ['off.update', $offline_town_portal->c_id], 'method' => 'PATCH', 'id' => 'form', 'files' => true]) !!}


<h6 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">This tool is very useful when you found out that character is stuck somewhere in the maps. Just fill in the particular data and where you wish to teleport your character</h6>

@if($offline_town_portal->hasmanycharac()->where('c_status', 'A')->count() > 0)

	<fieldset class="form-group {{ $errors->has('c_id') ? ' has-error' : '' }}">
		<div class="row">
			<legend class="col-form-label col-4 pt-0 text-right">Hero :</legend>
			<div class="col-6">
			@foreach($offline_town_portal->hasmanycharac()->where('c_status', 'A')->get() as $char)
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

	<fieldset class="form-group {{ $errors->has('c_headerb') ? ' has-error' : '' }}">
		<div class="row">
			<legend class="col-form-label col-4 pt-0 text-right">Town :</legend>
			<div class="col-6">
				<div class="form-check">
					<input class="form-check-input {{ $errors->has('c_headerb') ? ' is-invalid' : NULL }}" type="radio" name="c_headerb" id="temoz" value="1;32383" {{ old('c_headerb')?'checked':NULL }}>
						<label class="form-check-label" for="temoz">Temoz</label>
						@if ($errors->has('c_headerb'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('c_headerb') }}</strong>
						</span>
						@endif
				</div>
				<div class="form-check">
					<input class="form-check-input {{ $errors->has('c_headerb') ? ' is-invalid' : NULL }}" type="radio" name="c_headerb" id="quanato" value="7;18013" {{ old('c_headerb')?'checked':NULL }}>
						<label class="form-check-label" for="quanato">Quanato</label>
						@if ($errors->has('c_headerb'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('c_headerb') }}</strong>
						</span>
						@endif
				</div>
			</div>
		</div>
	</fieldset>

	<div class="form-group row mb-0">
		<div class="col-8 offset-md-4">
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
			c_headerb: {
				validators: {
					notEmpty: {
						message: 'Please insert your message. '
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