@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>Hero Clone</h1>
	</div>
	<div class="card-body">
	@include('layouts.info')
	@include('layouts.errorform')

	<h6>This option will clone any character for whatever reason you may have</h6>

	<form method="POST" action="{{ route('heroclone.store') }}" id="form" accept-charset="UTF-8" enctype="multipart/form-data">
		@csrf

			<div class="form-group row {{ $errors->has('c_id1') ? ' has-error' : '' }}">
				{{ Form::label( 'email1', 'Please insert the character name that you want to clone (Source) : ', ['class' => 'col-4 col-form-label text-right'] ) }}
				<div class="col-6">
					{{ Form::text('c_id1', @$value, ['class' => 'form-control'.($errors->has('c_id1') ? ' is-invalid' : NULL), 'id' => 'email1', 'placeholder' => 'Please insert the character name that you want to clone (Source)']) }}
					<span id="type1"></span>
					@if ($errors->has('c_id1'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('c_id1') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group row {{ $errors->has('c_id2') ? ' has-error' : '' }}">
				{{ Form::label( 'email2', 'Please insert the character name that you want to restore (Target) : ', ['class' => 'col-4 col-form-label text-right'] ) }}
				<div class="col-6">
					{{ Form::text('c_id2', @$value, ['class' => 'form-control'.($errors->has('c_id2') ? ' is-invalid' : NULL), 'id' => 'email2', 'placeholder' => 'Please insert the character name that you want to restore (Target)']) }}
					<span id="type2"></span>
					@if ($errors->has('c_id2'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('c_id2') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group row mb-0">
				<div class="col-8 offset-4">
					{!! Form::button('Submit', ['class' => 'btn btn-primary', 'type' => 'submit', 'id' => 'btnsubmit']) !!}
				</div>
			</div>

	</form>

	</div>
</div>
@endsection

@section('js')
////////////////////////////////////////////////////////////////////////////////////
// select 2
$('#hero').select2({
	placeholder: 'Please choose',
	allowClear: true,
	closeOnSelect: true,
	width: '100%',
});

////////////////////////////////////////////////////////////////////////////////////
// jquery autocomplete
$( "#email1" ).autocomplete({
	// minLength: 2,
	source: function (request, response){
		$.ajax({
			type: "POST",
			url:'{{ route('list.index') }}?term=' + request.term,
			data: {
					request,
				},
			success: response,
			// dataType: 'json'
		});
	},
	focus: function( event, ui ) {
		$( "#email1" ).val( ui.item.value );
		return false;
	},
	select: function( event, ui ) {
		$( "#type1" ).html( ui.item.type );
		return false;
	}
});

$( "#email2" ).autocomplete({
	// minLength: 2,
	source: function (request, response){
		$.ajax({
			type: "POST",
			url:'{{ route('list.index') }}?term=' + request.term,
			data: {
					request,
				},
			success: response,
			// dataType: 'json'
		});
	},
	focus: function( event, ui ) {
		$( "#email2" ).val( ui.item.value );
		return false;
	},
	select: function( event, ui ) {
		$( "#type2" ).html( ui.item.type );
		return false;
	}
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
			c_id1: {
				validators: {
					notEmpty: {
						message: 'This cannot be empty!'
					},
					different: {
						field: 'c_id2',
						message: 'The username and password cannot be the same as each other'
					}
				}
			},
			c_id2: {
				validators: {
					notEmpty: {
						message: 'This cannot be empty!'
					},
					different: {
						field: 'c_id1',
						message: 'The username and password cannot be the same as each other'
					}
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