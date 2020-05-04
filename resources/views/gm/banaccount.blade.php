@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>Ban Account<h1>
	</div>
	<div class="card-body">
	@include('layouts.info')
	@include('layouts.errorform')

	<h6>Please NOTE : Don't use this tools if you are lagging cause you need to press the Submit Button only once, NOT twice due to lagging</h6>
	<h6>Please be very careful on permanent account banning because you are deleting the whole account. Whatever the reason you mad at the player, i recommend you to just temporarily ban him/her.</h6>

	{!! Form::open(['route' => 'banaccount.store', 'id' => 'form', 'files' => true]) !!}

			<div class="form-group row {{ $errors->has('c_id') ? ' has-error' : '' }}">
				{{ Form::label( 'email', 'Hero : ', ['class' => 'col-4 col-form-label text-right'] ) }}
				<div class="col-6">
					{{ Form::text('c_id', @$value, ['class' => 'form-control'.($errors->has('c_id') ? ' is-invalid' : NULL), 'id' => 'email', 'placeholder' => 'Hero']) }}
					@if ($errors->has('c_id'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('c_id') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group row {{ $errors->has('ban') ? ' has-error' : '' }}">
				{{ Form::label( 'banning', 'Banning Type : ', ['class' => 'col-4 col-form-label text-right'] ) }}
				<div class="col-6">
					{{ Form::select('ban', [1 => 'Temporary', 2 => 'Permanent'], @$value, ['class' => 'form-control'.($errors->has('ban') ? ' is-invalid' : NULL), 'id' => 'banning', 'placeholder' => 'Please choose']) }}
					@if ($errors->has('ban'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('ban') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group row mb-0">
				<div class="col-8 offset-4">
					{!! Form::button('Submit', ['class' => 'btn btn-primary', 'type' => 'submit', 'id' => 'btnsubmit']) !!}
				</div>
			</div>

	{!! Form::close() !!}

	</div>
</div>
@endsection

@section('js')
////////////////////////////////////////////////////////////////////////////////////
// select 2
$('#banning').select2({
	placeholder: 'Please choose',
	allowClear: true,
	closeOnSelect: true,
	width: '100%',
});

////////////////////////////////////////////////////////////////////////////////////
// jquery autocomplete
$( "#email" ).autocomplete({
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
	//search: function( event, ui ) {},
});

////////////////////////////////////////////////////////////////////////////////////
// ajax post confirm permanent ban
$(document).on('click', '[type=submit]', function(e){
	if( $('#banning').val() == 2){
		// console.log($('#banning').val());
		SwalInactiveSR();
		e.preventDefault();
	}
});

function SwalInactiveSR(){
	swal.fire({
		title: 'Permanent Ban Account',
		text: 'Are you sure you want to permanently ban this account? Please note that you cant revert this account anymore',
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Permanent Ban',
		// showLoaderOnConfirm: true,
		allowOutsideClick: false			  
	})
	.then((result) => {
		if (result.value) {
			swal.fire('Deleted!', 'Account has been deleted.', 'success')
			$('#form').submit();
		} else if (result.dismiss === swal.DismissReason.cancel) {
			swal.fire('Cancelled', 'Permanent Ban Account', 'info')
		}
	});
}

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
			ban: {
				validators: {
					notEmpty: {
						message: 'Please choose. '
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