@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>Inserting 1 Box Of Items In The Inventory</h1>
	</div>
	<div class="card-body">
	@include('layouts.info')
	@include('layouts.errorform')

	<h6>Choose which item you want and don't forget to put character name</h6>

	<form method="POST" action="{{ route('insert1boxofitem.store') }}" id="form" accept-charset="UTF-8" enctype="multipart/form-data">
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

			<div class="form-group row {{ $errors->has('m_body') ? ' has-error' : '' }}">
				{{ Form::label( 'hero1', 'Choose A Box Of Item : ', ['class' => 'col-4 col-form-label text-right'] ) }}
				<div class="col-6" id="box_wrap">
					<div class="row_box">
						<div class="col-12 form-row">
							<div class="col-1 text-danger">
									<i class="fas fa-trash removebox" aria-hidden="true" id="delete_item_1"></i>
							</div>
							<div class="col-8">
								<select name="box[1][item]" id="hero1" class="form-control {{ $errors->has('box.*.item') ? ' is-invalid' : NULL }}">
									<option value="">Please choose</option>
								@foreach(config('a3.insert1box') as $k => $v)
									<optgroup label="{{ $k }}">
									@foreach($v as $l => $j)
										<option value="{{ $l }}" {{ (old('box.*.item'))? 'selected' :NULL }}>{{ $j }}</option>
									@endforeach
									</optgroup>
								@endforeach
								</select>
								@if ($errors->has('box.*.item'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('box.*.item') }}</strong>
								</span>
								@endif
							</div>
							<div class="col-3">
								<select name="box[1][slot]" class="form-control {!! $errors->has('box.*.slot') ? ' is-invalid' : NULL !!}" id="slot1" placeholder="Please choose">
									<option value="">Please choose slot</option>
									@foreach(config('a3.invslot') as $t => $v)
									<option value="{{ $t }}" {{ old('box.*.slot')? 'selected' : NULL }} >{{ $v }}</option>
									@endforeach
								</select>
								@if ($errors->has('box.*.slot'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('box.*.slot') }}</strong>
								</span>
								@endif
							</div>
						</div>
					</div>
				</div>
				<div class="row offset-4" id="moreslot">
					<span class="text-primary"><i class="fas fa-plus" aria-hidden="true"></i> Add more box</span>
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
$('#hero1, #slot1').select2({
	placeholder: 'Please choose',
	allowClear: true,
	closeOnSelect: true,
	width: '100%',
});

////////////////////////////////////////////////////////////////////////////////////
// add more option
var xs = 1;
$("#moreslot").click(function(e){
	e.preventDefault();

	//max input box allowed
	if(xs < 20){
		xs++;
		$("#box_wrap").append(

					'<div class="row_box">' +
						'<div class="col-12 form-row">' +
							'<div class="col-1 text-danger">' +
									'<i class="fas fa-trash removebox" aria-hidden="true" id="delete_item_' + xs + '"></i>' +
							'</div>' +
							'<div class="col-8">' +
								'<select name="box[' + xs + '][item]" id="hero' + xs + '" class="form-control {{ $errors->has('box.*.item') ? ' is-invalid' : NULL }}">' +
									'<option value="">Please choose</option>' +
								@foreach(config('a3.insert1box') as $k => $v)
									'<optgroup label="{{ $k }}">' +
									@foreach($v as $l => $j)
										'<option value="{{ $l }}" {{ (old('box.*.item'))? 'selected' :NULL }}>{{ $j }}</option>' +
									@endforeach
									'</optgroup>' +
								@endforeach
								'</select>' +
								@if ($errors->has('box.*.item'))
								'<span class="invalid-feedback" role="alert">' +
									'<strong>{{ $errors->first('box.*.item') }}</strong>' +
								'</span>' +
								@endif
							'</div>' +
							'<div class="col-3">' +
								'<select name="box[' + xs + '][slot]" class="form-control {!! $errors->has('box.*.slot') ? ' is-invalid' : NULL !!}" id="slot' + xs + '" placeholder="Please choose">' +
									'<option value="">Please choose slot</option>' +
									@foreach(config('a3.invslot') as $t => $v)
									'<option value="{{ $t }}" {{ old('box.*.slot')? 'selected' : NULL }} >{{ $v }}</option>' +
									@endforeach
								'</select>' +
								@if ($errors->has('box.*.slot'))
								'<span class="invalid-feedback" role="alert">' +
									'<strong>{{ $errors->first('box.*.slot') }}</strong>' +
								'</span>' +
								@endif
							'</div>' +
						'</div>' +
					'</div>' +
				'</div>'

		); //add input box

		$('#hero' + xs + ',#slot' + xs).select2({
			placeholder: 'Please choose',
			allowClear: true,
			closeOnSelect: true,
			width: '100%',
		});
		
		//bootstrap validate
		$('#form').bootstrapValidator('addField',$('.row_box').find('[name="box[' + xs + '][item]"]'));
		$('#form').bootstrapValidator('addField',$('.row_box').find('[name="box[' + xs + '][slot]"]'));
	}
});

$("#box_wrap").on("click",".removebox", function(e){
	//user click on remove text
	e.preventDefault();
	//var $row = $(this).parent('.row_box');
	var $row = $(this).parent().parent().parent();
	var $option1 = $row.find('[name="box[][item]"]');
	var $option2 = $row.find('[name="box[][slot]"]');

	// $row.css({"border": "red", "color": "yellow"});

	$('#form').bootstrapValidator('removeField', $option1);
	$('#form').bootstrapValidator('removeField', $option2);

	$row.remove();

	xs--;
	// console.log(xs);
})



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
@for($i = 1; $i <= 20; $i++)
			'box[{{ $i }}][item]': {
				validators: {
					notEmpty: {
						message: 'Please choose. '
					},
				}
			},
			'box[{{ $i }}][slot]': {
				validators: {
					notEmpty: {
						message: 'Please choose. '
					},
				}
			},
@endfor
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