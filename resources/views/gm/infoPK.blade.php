@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>Info Player Kill</h1>
	</div>
	<div class="card-body">
	@include('layouts.info')
	@include('layouts.errorform')

	<h6>Insert Hero to see the Player Kill Info</h6>

	<form method="POST" action="{{ route('infoPK.store') }}" id="form" accept-charset="UTF-8" enctype="multipart/form-data">
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

			<div class="form-group row {{ $errors->has('timer') ? ' has-error' : '' }}">
				{{ Form::label( 'tm', 'Timer : ', ['class' => 'col-4 col-form-label text-right'] ) }}
				<div class="col-6">
					{{ Form::number('timer', @$value, ['class' => 'form-control'.($errors->has('timer') ? ' is-invalid' : NULL), 'id' => 'tm', 'placeholder' => 'Timer', 'min' => 0]) }}
					<span id="type"></span>
					@if ($errors->has('timer'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('timer') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<p><strong class="hero"></strong> pking people for <strong id="pk"></strong> times.</p>
					<p>And timer before <strong class="hero"></strong> can PK again is = <strong id="rtm"></strong></p>
					<p>If the timer is 0, <strong class="hero"></strong> can PK at anytime he/she want and if you don't want <strong class="hero"></strong> to PK, set it timer more than 1,500 or higher, for example : maybe 20,000 ?</p>
					<p>If you set to only 1,500, <strong class="hero"></strong> can bail out the timer by using its lore.</p>
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
		$( ".hero" ).html( ui.item.value );
		$( "#pk" ).html( ui.item.pk );
		$( "#rtm" ).html( ui.item.rtm );
		return false;
	}
})
// .autocomplete( "instance" )._renderItem = function( ul, item ) {
// 	return $( "<li>" )
// 		.append( "<div>" + item.value + "<br>" + item.type + "</div>" )
// 		.appendTo( ul );
// }
;

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