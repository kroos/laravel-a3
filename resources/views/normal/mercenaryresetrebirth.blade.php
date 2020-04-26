@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>Mercenary Reset Rebirth<h1>
	</div>
	<div class="card-body">
	@include('layouts.info')
	@include('layouts.errorform')

	{!! Form::model($mercenary_reset_rebirth, ['route' => ['mercenaryresetrebirth.update', $mercenary_reset_rebirth->c_id], 'method' => 'PATCH', 'id' => 'form', 'files' => true]) !!}

	<h6>Same like you reset rebirth your character. To use this tools, you need at least {{ config('a3.mercwzreset') }} wz when your mercenary is level {{ config('a3.mercresetlvl') }} and this only applied if and only if your mercenary is at rebirth level {{ config('a3.mercrblevel') }} and your mercenary rank is not a '{{ config('a3.mrank6') }}'</h6>

		@if($mercenary_reset_rebirth->hasmanycharac()->where('c_status', 'A')->count() > 0)

			<div class="form-group row {{ $errors->has('c_id') ? ' has-error' : '' }}">
				<label for="hero" class="col-4 col-form-label pt-0 text-right">Hero :</label>
				<div class="col-6">
					<select name="c_id" class="form-control {{ $errors->has('c_id') ? 'is-invalid' : NULL }}" id="hero">
						<option value="">Please Choose</option>
						@foreach($mercenary_reset_rebirth->hasmanycharac()->where('c_status', 'A')->get() as $char)
						<option value="{{ $char->c_id }}">{{ $char->c_id }}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group row {{ $errors->has('HSID') ? ' has-error' : '' }}">
				<label for="merc" class="col-4 col-form-label pt-0 text-right">Mercenary :</label>
				<div class="col-6">
					<select name="HSID" class="form-control {{ $errors->has('HSID') ? 'is-invalid' : NULL }}" id="merc">
						<option value="">Please Choose</option>
						@foreach($mercenary_reset_rebirth->hasmanycharac()->where('c_status', 'A')->get() as $char)
							@foreach($char->hasmanyhstable()->where('HSState', 1)->whereNull('DelDate')->get() as $merc)
								<option value="{{ $merc->HSID }}" class="{{ $merc->MasterName }}">{{ $merc->HSName }}</option>
							@endforeach
						@endforeach
					</select>
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
$('#hero, #merc').select2({
	placeholder: 'Please choose',
	allowClear: true,
	closeOnSelect: true,
	width: '100%',
});

////////////////////////////////////////////////////////////////////////////////////
// select chained
$("#merc").chainedTo("#hero");

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
			HSID: {
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