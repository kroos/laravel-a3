@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>{!! $post->belongstopostcategory->category !!}</h1>
	</div>
	<div class="card-body">
			@include('layouts.info')
			@include('layouts.errorform')
			@include('postcategory.post._show')
	</div>
</div>
@endsection

@section('js')
/////////////////////////////////////////////////////////////////////////////////////////
// post delete
$(document).on('click', '.deletepost', function(e){
	var post_id = $(this).data('id');
	PostDelete(post_id);
	e.preventDefault();
});

function PostDelete(post_id){
	swal.fire({
		title: 'Are you sure?',
		text: "Post will be deleted!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!',
		showLoaderOnConfirm: true,

		preConfirm: function() {
			return new Promise(function(resolve) {
				$.ajax({
					type: 'DELETE',
					url: '{{ url('post') }}' + '/' + post_id,
					data: {
							_token : $('meta[name=csrf-token]').attr('content'),
							id: post_id,
					},
					dataType: 'json'
				})
				.done(function(response){
					swal.fire('Deleted!', response.message, response.status)
					.then(function(){
						window.location.reload(true);
					});
					//$('#disable_user_' + post_id).parent().parent().remove();
				})
				.fail(function(){
					swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
				})
			});
		},
		allowOutsideClick: false
	})
	.then((result) => {
		if (result.dismiss === swal.DismissReason.cancel) {
			swal.fire('Cancelled', 'Your data is safe from delete', 'info')
		}
	});
}

////////////////////////////////////////////////////////////////////////////////////
// comment delete
$(document).on('click', '.deletecomment', function(e){
	var comment_id = $(this).data('id');
	CommentDelete(comment_id);
	e.preventDefault();
});

function CommentDelete(comment_id){
	swal.fire({
		title: 'Are you sure?',
		text: "Comment will be deleted!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!',
		showLoaderOnConfirm: true,

		preConfirm: function() {
			return new Promise(function(resolve) {
				$.ajax({
					type: 'DELETE',
					url: '{{ url('postComment') }}' + '/' + comment_id,
					data: {
							_token : $('meta[name=csrf-token]').attr('content'),
							id: comment_id,
					},
					dataType: 'json'
				})
				.done(function(response){
					swal.fire('Deleted!', response.message, response.status)
					.then(function(){
						window.location.reload(true);
					});
					//$('#disable_user_' + comment_id).parent().parent().remove();
				})
				.fail(function(){
					swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
				})
			});
		},
		allowOutsideClick: false
	})
	.then((result) => {
		if (result.dismiss === swal.DismissReason.cancel) {
			swal.fire('Cancelled', 'Your data is safe from delete', 'info')
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
			comment: {
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
	.find('[name="comment"]')
	.ckeditor()
	.editor
	// To use the 'change' event, use CKEditor 4.2 or later
	.on('change', function(e) {
		// Revalidate the bio field
		$('#form').bootstrapValidator('revalidateField', 'comment');
		// console.log( $('#comment').val() );
	});

////////////////////////////////////////////////////////////////////////////////////

@endsection