@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>News</h1>
	</div>
	<div class="card-body">
			@include('layouts.info')
			@include('layouts.errorform')

			@include('news._index')
	</div>
</div>
@endsection

@section('js')

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// bootstrap validator
	$('#form').bootstrapValidator({
		fields: {
			news: {
				validators: {
					notEmpty: {
						message: 'Please insert your post. '
					},
					callback: {
						message: 'The post must be less than 500 characters long',
						callback: function(value, validator, $field) {
							// Get the plain text without HTML
							var div  = $('<div/>').html(value).get(0),
							text = div.textContent || div.innerText;

							return text.length <= 100;
						},
					}
				}
			},
			subject: {
				validators: {
					notEmpty: {
						message: 'Please insert subject. '
					}
				}
			},
		}
	})
	.find('[name="news"]')
	.ckeditor()
	.editor
	// To use the 'change' event, use CKEditor 4.2 or later
	.on('change', function(e) {
		// Revalidate the bio field
		$('#form').bootstrapValidator('revalidateField', 'news');
		console.log($('#news').val());
	});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

@endsection