@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>Edit Mercenary Points<h1>
	</div>
	<div class="card-body">
	@include('layouts.info')
	@include('layouts.errorform')

	{!! Form::model($mercenary_points, ['route' => ['mercenarypoints.update', $mercenary_points->c_id], 'method' => 'PATCH', 'id' => 'form', 'files' => true]) !!}

	<h6>Please click on your hero below which you want to add your stat points</h6>
	<h6>Please make sure that all the values will not exceed 65530</h6>

		@if($mercenary_points->hasmanycharac()->where('c_status', 'A')->count() > 0)

			<div class="form-group row {{ $errors->has('c_id') ? ' has-error' : '' }}">
				<label for="hero" class="col-4 col-form-label pt-0 text-right">Hero :</label>
				<div class="col-4">
					<select name="c_id" class="form-control {{ $errors->has('c_id') ? 'is-invalid' : NULL }}" id="hero">
						<option value="">Please Choose</option>
						@foreach($mercenary_points->hasmanycharac()->where('c_status', 'A')->get() as $char)
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
						@foreach($mercenary_points->hasmanycharac()->where('c_status', 'A')->get() as $char)
							@foreach($char->hasmanyhstable()->where('HSState', 0)->whereNull('DelDate')->get() as $merc)
								<option value="{{ $merc->HSID }}" class="{{ $merc->MasterName }}">{{ $merc->HSName }}</option>
							@endforeach
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group row {{ $errors->has('str') ? ' has-error' : '' }} str">
				{{ Form::label( 'str1', 'Strength : ', ['class' => 'col-4 col-form-label text-right'] ) }}
				<div class="col-2">
					<input type="number" name="str" value="{{ old('str') }}" class="form-control{{ $errors->has('str') ? ' is-invalid' : NULL }}" id="str1" placeholder="Strength" readonly>
					@if ($errors->has('str'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('str') }}</strong>
					</span>
					@endif
				</div>
				<div class="col-1">
					<span id="str2">0</span>
				</div>
				<div class="col-1">
					<span id="str3" class="totalpoint"></span>
				</div>
			</div>

			<div class="form-group row {{ $errors->has('int') ? ' has-error' : '' }} int">
				{{ Form::label( 'int1', 'Intelligence : ', ['class' => 'col-4 col-form-label text-right'] ) }}
				<div class="col-2">
					<input type="number" name="int" value="{{ old('int') }}" class="form-control{{ $errors->has('int') ? ' is-invalid' : NULL }}" id="int1" placeholder="Intelligence" readonly>
					@if ($errors->has('int'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('int') }}</strong>
					</span>
					@endif
				</div>
				<div class="col-1">
					<span id="int2">0</span>
				</div>
				<div class="col-1">
					<span id="int3" class="totalpoint"></span>
				</div>
			</div>

			<div class="form-group row {{ $errors->has('dex') ? ' has-error' : '' }}">
				{{ Form::label( 'dex1', 'Dexterity : ', ['class' => 'col-4 col-form-label text-right'] ) }}
				<div class="col-2">
					<input type="number" name="dex" value="{{ old('dex') }}" class="form-control{{ $errors->has('dex') ? ' is-invalid' : NULL }}" id="dex1" placeholder="Dexterity">
					@if ($errors->has('dex'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('dex') }}</strong>
					</span>
					@endif
				</div>
				<div class="col-1">
					<span id="dex2">0</span>
				</div>
				<div class="col-1">
					<span id="dex3" class="totalpoint"></span>
				</div>
			</div>

			<div class="form-group row {{ $errors->has('vit') ? ' has-error' : '' }}">
				{{ Form::label( 'vit1', 'Vitality : ', ['class' => 'col-4 col-form-label text-right'] ) }}
				<div class="col-2">
					<input type="number" name="vit" value="{{ old('vit') }}" class="form-control{{ $errors->has('vit') ? ' is-invalid' : NULL }}" id="vit1" placeholder="Vitality">
					@if ($errors->has('vit'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('vit') }}</strong>
					</span>
					@endif
				</div>
				<div class="col-1">
					<span id="vit2">0</span>
				</div>
				<div class="col-1">
					<span id="vit3" class="totalpoint"></span>
				</div>
			</div>

			<div class="form-group row {{ $errors->has('mana') ? ' has-error' : '' }}">
				{{ Form::label( 'mana1', 'Mana : ', ['class' => 'col-4 col-form-label text-right'] ) }}
				<div class="col-2">
					<input type="number" name="mana" value="{{ old('mana') }}" class="form-control{{ $errors->has('mana') ? ' is-invalid' : NULL }}" id="mana1" placeholder="Mana" readOnly>
					@if ($errors->has('mana'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('mana') }}</strong>
					</span>
					@endif
				</div>
				<div class="col-1">
					<span id="mana2">0</span>
				</div>
				<div class="col-1">
					<span id="mana3" class="totalpoint"></span>
				</div>
			</div>

			<div class="form-group row {{ $errors->has('points') ? ' has-error' : '' }}">
				{{ Form::label( 'points1', 'Point Remaining : ', ['class' => 'col-4 col-form-label text-right'] ) }}
				<div class="col-2">
					<input type="number" name="points" value="{{ old('points') }}" class="form-control  {{ $errors->has('points') ? ' is-invalid' : NULL }}" id="points1" placeholder="Point Remaining" readonly>
					@if ($errors->has('points'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('points') }}</strong>
					</span>
					@endif
				</div>
				<div class="col-1">
					<span id="points2">0</span>
				</div>
				<div class="col-1">
					<span id="points3"></span>
				</div>
			</div>

			<div class="form-group row mb-0">
				<div class="col-8 offset-4">
					{!! Form::button('Submit', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
				</div>
			</div>
		@else
		<p>Please create a character.</p>
		@endif

	{{ Form::close() }}

	</div>
</div>
@endsection

@section('js')
////////////////////////////////////////////////////////////////////////////////////
// select 2
$('#hero, #merc').select2({
	placeholder: 'Please choose',
	allowClear: true,
	closeOnSelect: true,
	width: '100%',
});

////////////////////////////////////////////////////////////////////////////////////
// select chained
$("#merc").chainedTo("#hero");

////////////////////////////////////////////////////////////////////////////////////
// ajax
$('#merc').on('change', function() {
	// $selection = $(this).find(':selected');
	$selection = $(this).find(':selected');
	// console.log($selection.val());

	// ajax for finding hero type
	var data1 = $.ajax({
		url: "{{ url('/api/hstable/') }}/" + $selection.val(),
		type: "POST",
		data: {_token: '{!! csrf_token() !!}'},
		dataType: 'json',
		global: false,
		async:false,
		success: function (response) {
			// you will get response from your php page (what you echo or print)
			return response;
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(textStatus, errorThrown);
		}
	}).responseText;

	// convert data1 into json
	var obj = $.parseJSON( data1 );

	if(obj.type == 2) {																				// this is a mage hero
		$('form input[name="str"]').prop("readonly", true);
		$('form input[name="int"]').prop("readonly", false);

		// bootstrap validator
		$('#form').bootstrapValidator( 'addField', $('.int').find('form input[name="int"]') );
		$('#form').bootstrapValidator( 'removeField', $('.str').find('form input[name="str"]') );
	} else {																						// this is a warrior, holy knight, archer hero
		$('form input[name="str"]').prop("readonly", false);
		$('form input[name="int"]').prop("readonly", true);

		// bootstrap validator
		$('#form').bootstrapValidator( 'addField', $('.str').find('form input[name="str"]') );
		$('#form').bootstrapValidator( 'removeField', $('.int').find('form input[name="int"]') );
	}

		// setting up the value for attributes
		$('#str1').val(obj.str).attr({"min" : obj.str});
		$('#int1').val(obj.int).attr({"min" : obj.int});
		$('#dex1').val(obj.dex).attr({"min" : obj.dex});
		$('#vit1').val(obj.vit).attr({"min" : obj.vit});
		$('#mana1').val(obj.mana).attr({"min" : obj.mana});
		$('#points1').val(obj.points);

		$("#str2").text(obj.str);
		$("#int2").text(obj.int);
		$("#dex2").text(obj.dex);
		$("#vit2").text(obj.vit);
		$("#mana2").text(obj.mana);
		$("#points2").text(obj.points);

		$("#str3").text(0);
		$("#int3").text(0);
		$("#dex3").text(0);
		$("#vit3").text(0);
		$("#mana3").text(0);
		$("#points3").text(0);

		// $("#str2").css({"color": "red", "border": "2px solid red"});
});

////////////////////////////////////////////////////////////////////////////////////
// start counting, start with str
$(document).on('change', '#str1', function () {

	var str1 = $('#str1');
	var str2 = $('#str2');

	var cstr = (str1.val() * 100/100) - (str2.text() * 100/100);
	$('#str3').text(cstr);

	// .css({"color": "red", "border": "2px solid red"});

	//update total points been used
	update_totalpoints();
});

$(document).on('change', '#int1', function () {

	var int1 = $('#int1');
	var int2 = $('#int2');

	var cint = (int1.val() * 100/100) - (int2.text() * 100/100);
	$('#int3').text(cint);

	// .css({"color": "red", "border": "2px solid red"});

	//update total points been used
	update_totalpoints();
});

$(document).on('change', '#dex1', function () {

	var dex1 = $('#dex1');
	var dex2 = $('#dex2');

	var cdex = (dex1.val() * 100/100) - (dex2.text() * 100/100);
	$('#dex3').text(cdex);

	// .css({"color": "red", "border": "2px solid red"});

	//update total points been used
	update_totalpoints();
});

$(document).on('change', '#vit1', function () {

	var vit1 = $('#vit1');
	var vit2 = $('#vit2');

	var cvit = (vit1.val() * 100/100) - (vit2.text() * 100/100);
	$('#vit3').text(cvit);

	// .css({"color": "red", "border": "2px solid red"});

	//update total points been used
	update_totalpoints();
});

$(document).on('change', '#mana1', function () {

	var mana1 = $('#mana1');
	var mana2 = $('#mana2');

	var cmana = (mana1.val() * 100/100) - (mana2.text() * 100/100);
	$('#mana3').text(cmana);

	// .css({"color": "red", "border": "2px solid red"});

	//update total points been used
	update_totalpoints();
});



// count all points been used
function update_totalpoints() {
	var myNodelistp = $(".totalpoint");
	var psum = 0;
	for (var ip = myNodelistp.length - 1; ip >= 0; ip--) {
		// myNodelistp[ip].style.backgroundColor = "red";

		psum = ( (psum * 10000) + (myNodelistp[ip].innerHTML * 10000) ) / 10000;
		// psum = ( (psum * 10000) + (myNodelistp[ip].value * 10000) ) / 10000;

		console.log(myNodelistp[ip].innerHTML);
		// console.log(myNodelistp[ip].value);
		// console.log(psum);
	}
	$('#points3').text( psum );
	$('#points1').val( ($('#points2').text()) - ($('#points3').text()) );

	// revalidate all the inputs
	$('#form').bootstrapValidator('revalidateField', 'str');
	$('#form').bootstrapValidator('revalidateField', 'int');
	$('#form').bootstrapValidator('revalidateField', 'dex');
	$('#form').bootstrapValidator('revalidateField', 'vit');
	$('#form').bootstrapValidator('revalidateField', 'mana');
	$('#form').bootstrapValidator('revalidateField', 'points');
};

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
			HSID: {
				validators: {
					notEmpty: {
						message: 'This cannot be empty!'
					},
				}
			},
			str: {
				validators: {
					notEmpty: {
						message: 'This cannot be empty!'
					},
					integer: {
						message: 'The value is not an integer. '
					},
					greaterThan: {
						inclusive: true,
						value: 0,
						message: 'Please enter a value greater than or equal to %s. '
					},
					lessThan: {
						inclusive: true,
						value: 65530,
						message: 'Please enter a value lesser than or equal to %s. '
					},
				}
			},
			int: {
				validators: {
					notEmpty: {
						message: 'This cannot be empty!'
					},
					integer: {
						message: 'The value is not an integer. '
					},
					greaterThan: {
						inclusive: true,
						value: 0,
						message: 'Please enter a value greater than or equal to %s. '
					},
					lessThan: {
						inclusive: true,
						value: 65530,
						message: 'Please enter a value lesser than or equal to %s. '
					},
				}
			},
			dex: {
				validators: {
					notEmpty: {
						message: 'This cannot be empty!'
					},
					integer: {
						message: 'The value is not an integer. '
					},
					greaterThan: {
						inclusive: true,
						value: 0,
						message: 'Please enter a value greater than or equal to %s. '
					},
					lessThan: {
						inclusive: true,
						value: 65530,
						message: 'Please enter a value lesser than or equal to %s. '
					},
				}
			},
			vit: {
				validators: {
					notEmpty: {
						message: 'This cannot be empty!'
					},
					integer: {
						message: 'The value is not an integer. '
					},
					greaterThan: {
						inclusive: true,
						value: 0,
						message: 'Please enter a value greater than or equal to %s. '
					},
					lessThan: {
						inclusive: true,
						value: 65530,
						message: 'Please enter a value lesser than or equal to %s. '
					},
				}
			},
			mana: {
				validators: {
					notEmpty: {
						message: 'This cannot be empty!'
					},
					integer: {
						message: 'The value is not an integer. '
					},
					greaterThan: {
						inclusive: true,
						value: 0,
						message: 'Please enter a value greater than or equal to %s. '
					},
					lessThan: {
						inclusive: true,
						value: 65530,
						message: 'Please enter a value lesser than or equal to %s. '
					},
				}
			},
			points: {
				validators: {
					notEmpty: {
						message: 'This cannot be empty!'
					},
					integer: {
						message: 'The value is not an integer. '
					},
					greaterThan: {
						inclusive: true,
						value: 0,
						message: 'Please enter a value greater than or equal to %s. '
					},
					lessThan: {
						inclusive: true,
						value: 65530,
						message: 'Please enter a value lesser than or equal to %s. '
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