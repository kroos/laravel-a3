@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>Buy Lore<h1>
	</div>
	<div class="card-body">
	@include('layouts.info')
	@include('layouts.errorform')

	{!! Form::model($buy_lore, ['route' => ['buylore.update', $buy_lore->c_id], 'method' => 'PATCH', 'id' => 'form', 'files' => true]) !!}


	<h6 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">For each lore you buy, it will cost you {{ config('a3.buy_lore') }} wz so if you buy 1,000 lore it will cost {{ config('a3.buy_lore') * 1000 }} wz. You can use this AMT if and only if your rebirth level is greater or equal than {{ config('a3.lore_rb_buy') }}.<br />Summary :<br />Your rebirth level >= {{ config('a3.lore_rb_buy') }}<br />1 lore = {{ config('a3.buy_lore') }} wz</h6>



		@if($buy_lore->hasmanycharac()->where('c_status', 'A')->count() > 0)

			<fieldset class="form-group {{ $errors->has('c_id') ? ' has-error' : '' }}">
				<div class="row">
					<legend class="col-form-label col-4 pt-0 text-right">Hero :</legend>
					<div class="col-6">
					@foreach($buy_lore->hasmanycharac()->where('c_status', 'A')->get() as $char)
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

			<div class="form-group row {{ $errors->has('lore') ? ' has-error' : '' }}">
				{{ Form::label( 'email', 'Lore : ', ['class' => 'col-4 col-form-label text-right'] ) }}
				<div class="col-6">
					{{ Form::number('lore', @$value, ['class' => 'form-control'.($errors->has('lore') ? ' is-invalid' : NULL), 'id' => 'email', 'placeholder' => 'Lore']) }}
					@if ($errors->has('lore'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('lore') }}</strong>
					</span>
					@endif
				</div>
			</div>
		
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
			lore: {
				validators: {
					notEmpty: {
						message: 'Please insert your message. '
					},
					integer: {
						message: 'The value is not an integer'
					},
					greaterThan: {
						inclusive: true,
						value: 0,
						message: 'Please enter a value greater than or equal to %s'
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