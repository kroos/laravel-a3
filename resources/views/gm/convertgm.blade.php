@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>Convert To Game Master<h1>
	</div>
	<div class="card-body">
	@include('layouts.info')
	@include('layouts.errorform')



	<h6>Use this tools to upgrade user account to Game Master or normal user.</h6>
	<h6>They can access this section (GM Tools) by just changing his/her account to "Game Master" by using this tool.</h6>

	<form action="#" id="form" accept-charset="UTF-8" enctype="multipart/form-data">
		@csrf

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

			<div class="form-group row {{ $errors->has('c_sheaderb') ? ' has-error' : '' }}">
				{{ Form::label( 'hero', 'Roles : ', ['class' => 'col-4 col-form-label text-right'] ) }}
				<div class="col-6">
					{{ Form::select('c_sheaderb', \App\Model\Roles::where('id', 1)->pluck('role', 'id')->toArray(), @$value, ['class' => 'form-control'.($errors->has('c_sheaderb') ? ' is-invalid' : NULL), 'id' => 'hero', 'placeholder' => 'Please choose']) }}
					@if ($errors->has('c_sheaderb'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('c_sheaderb') }}</strong>
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
// ajax post submit data CRUD
	// Bind to the submit event of our form
	$("#btnsubmit").click(function (event){

		// Prevent default posting of form - put here to work in case of errors
		event.preventDefault();

		// Get from elements values from the FORM! (id, class or name)
		var values = $('#form').serialize();
		console.log(values);

		$.ajax({
			url: "{{ route('convertgm.update') }}",
			type: "POST",
			data: values,
			success: function (response) {
				// you will get response from your php page (what you echo or print)
				// alert(response);
				swal.fire({
						title: 'Success Converting Account!',
						text: 'Succesfully update the Account.',
						html: response.message,
						icon: 'success',
					});
			},
			error: function(jqXHR, textStatus, errorThrown) {
				// console.log(jqXHR.message, textStatus, errorThrown);
				swal.fire({
						title: 'Error !!',
						text: 'Your data has been inserted.',
						html: '<p class="text-danger">' + jqXHR.responseJSON.errors.c_id + '</p>' +
								'<p class="text-danger">' + jqXHR.responseJSON.errors.c_sheaderb + '</p>',
						icon: 'error',
					});
			}
		});
	})

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
			c_sheaderb: {
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