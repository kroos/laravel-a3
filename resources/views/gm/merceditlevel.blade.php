@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>Mercenary Edit Level</h1>
	</div>
	<div class="card-body">
	@include('layouts.info')
	@include('layouts.errorform')

	<h6>Please take note that only level  300 is available. Will update more if I have a time.</h6>

	<form method="POST" action="{{ route('merceditlevel.store') }}" id="form" accept-charset="UTF-8" enctype="multipart/form-data">
		@csrf

			<div class="form-group row {{ $errors->has('c_id') ? ' has-error' : '' }}">
				<label for="hero" class="col-4 col-form-label pt-0 text-right">Hero :</label>
				<div class="col-4">
					<select name="c_id" class="form-control {{ $errors->has('c_id') ? 'is-invalid' : NULL }}" id="hero">
						<option value="">Please Choose</option>
						@foreach(App\Model\Charac0::where('c_status', 'A')->get() as $char)
						<option value="{{ $char->c_id }}">{{ $char->c_id }}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group row {{ $errors->has('HSID') ? ' has-error' : '' }}">
				<label for="merc" class="col-4 col-form-label pt-0 text-right">Mercenary :</label>
				<div class="col-4">
					<select name="HSID" class="form-control {{ $errors->has('HSID') ? 'is-invalid' : NULL }}" id="merc">
						<option value="">Please Choose</option>
						@foreach(App\Model\HSTable::where('HSState', 0)->whereNull('DelDate')->get() as $merc)
						<option value="{{ $merc->HSID }}" class="{{ $merc->MasterName }}">{{ $merc->HSName }}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group row {{ $errors->has('HSExp') ? ' has-error' : '' }}">
				{{ Form::label( 'armor', 'Level : ', ['class' => 'col-4 col-form-label text-right'] ) }}
				<div class="col-4">
					{{ Form::select('HSExp', config('a3.merceditlevel'), @$value, ['class' => 'form-control'.($errors->has('HSExp') ? ' is-invalid' : NULL), 'id' => 'armor', 'placeholder' => 'Please choose']) }}
					@if ($errors->has('HSExp'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('HSExp') }}</strong>
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
$('#hero, #merc, #armor').select2({
	placeholder: 'Please choose',
	allowClear: true,
	closeOnSelect: true,
	width: '100%',
});

////////////////////////////////////////////////////////////////////////////////////
// select chained
$("#merc").chainedTo("#hero");

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
						message: 'Please choose. '
					},
				}
			},
			HSID: {
				validators: {
					notEmpty: {
						message: 'Please choose. '
					},
				}
			},
			HSExp: {
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