@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>Edit Comment</h1>
	</div>
	<div class="card-body">
			@include('layouts.info')
			@include('layouts.errorform')
{!! Form::model($postComment, ['route' => ['postComment.update', $postComment->id], 'method' => 'PATCH', 'id' => 'form', 'files' => true]) !!}
			@include('postcategory.post.postcomment._edit')
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
			comment: {
				validators: {
					notEmpty: {
						message: 'Please insert your message. '
					},
					callback: {
						message: 'The comment must be less than 200 characters long',
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
	.find('[name="comment"]')
	.ckeditor()
	.editor
	// To use the 'change' event, use CKEditor 4.2 or later
	.on('change', function(e) {
		// Revalidate the bio field
		$('#form').bootstrapValidator('revalidateField', 'comment');
		// console.log( $('#postmessage').val() );
	});

////////////////////////////////////////////////////////////////////////////////////
@endsection