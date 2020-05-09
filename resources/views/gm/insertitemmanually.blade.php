@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>Insert Item Manually</h1>
	</div>
	<div class="card-body">
	@include('layouts.info')
	@include('layouts.errorform')

	<h6>Please take a listen and look carefully becos this 1 is the most trickiest part of the tools.</h6>
	<h6>This will wipe out all hero item in the inventory to make sure that it wont break the database.</h6>
	<h6>First of all, just put the hero name, its easy.</h6>
	<h6>2nd u have to put the code, the code must be consists of 4 sections and the format should look like this</h6>
	<h6><strong>xxxxxx;xxxxxx;xxxxx;slotnumber;</strong></h6>
	<h6>For example : if you want to inject 1 Upgrade Jewel inside a character (please dont do that, wasting your time....) so use this code :</h6>
	<h6>6144;123321;128;4;</h6>
	<h6>Make sure slot number <strong>5</strong> is empty, yes... number 5 not number 4.. becos the system start counting from 0, not from 1</h6>
	<h6>So for slot number 5, the system count like this..</h6>
	<h6>0 , 1 , 2 , 3 , 4  <---- number 5 to us...</h6>
	<h6>Please take a look at the sign ";" at the end of the code, if you forgot to put the sign ";" at the end, then the whole character might be corrupted</h6>
	<h6>So use a high caution using this tools</h6>

	<form method="POST" action="{{ route('insertitemmanually.store') }}" id="form" accept-charset="UTF-8" enctype="multipart/form-data">
		@csrf

			<div class="form-group row {{ $errors->has('c_id') ? ' has-error' : '' }}">
				{{ Form::label( 'email', 'Hero : ', ['class' => 'col-4 col-form-label text-right'] ) }}
				<div class="col-6">
					{{ Form::text('c_id', @$value, ['class' => 'form-control'.($errors->has('c_id') ? ' is-invalid' : NULL), 'id' => 'email', 'placeholder' => 'Hero']) }}
					<span id="type"></span>
					@if ($errors->has('c_id'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('c_id') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group row {{ $errors->has('inven') ? ' has-error' : '' }}">
				{{ Form::label( 'inven', 'Item : ', ['class' => 'col-4 col-form-label text-right'] ) }}
				<div class="col-6">
					{{ Form::text('inven', @$value, ['class' => 'form-control'.($errors->has('inven') ? ' is-invalid' : NULL), 'id' => 'inven', 'placeholder' => 'Item']) }}
					<span id="type"></span>
					@if ($errors->has('inven'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('inven') }}</strong>
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
	focus: function( event, ui ) {
		$( "#email" ).val( ui.item.value );
		return false;
	},
	select: function( event, ui ) {
		$( "#type" ).html( ui.item.type );
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
			c_id: {
				validators: {
					notEmpty: {
						message: 'This cannot be empty!'
					},
				}
			},
			inven: {
				validators: {
					notEmpty: {
						message: 'This cannot be empty '
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