@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>Create Post</h1>
	</div>
	<div class="card-body">
			@include('layouts.info')
			@include('layouts.errorform')

		{!! Form::open(['route' => ['post.store', 'category_id='.request('category_id')], 'id' => 'form', 'autocomplete' => 'off', 'files' => true]) !!}
			@include('postcategory.post._create')
		{{ Form::close() }}

	</div>
</div>
@endsection

@section('js')
////////////////////////////////////////////////////////////////////////////////////
// form validator
	$('#form').bootstrapValidator({
			feedbackIcons: {
			valid: '',
			invalid: '',
			validating: ''
		},
		fields: {
			subject: {
				validators: {
					notEmpty: {
						message: 'This cannot be empty!'
					},
				}
			},
			post: {
				validators: {
					notEmpty: {
						message: 'Please insert your message. '
					},
					callback: {
						message: 'The post must be less than 200 characters long',
						callback: function(value, validator, $field) {
							// Get the plain text without HTML
							var div  = $('<div/>').html(value).get(0),
							text = div.textContent || div.innerText;

							return text.length <= 200;
						},
					}
				}
			},
		}
	})
	.find('[name="post"]')
	.ckeditor()
	.editor
	// To use the 'change' event, use CKEditor 4.2 or later
	.on('change', function(e) {
		// Revalidate the bio field
		$('#form').bootstrapValidator('revalidateField', 'post');
		// console.log( $('#postmessage').val() );
	});

////////////////////////////////////////////////////////////////////////////////////
@endsection