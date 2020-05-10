@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>Serial List</h1>
	</div>
	<div class="card-body">
	@include('layouts.info')
	@include('layouts.errorform')

	<h6>Probably an arrangement of gift to player.</h6>

	<table id="serial" class="table table-hover" width="100%">
		<thead>
			<tr>
				<th>Serial No</th>
				<th>Item Info</th>
				<th>First Parameter</th>
				<th>Second Parameter</th>
				<th>Type</th>
				<th>Used Flag</th>
				<th>Expiry Date</th>
			</tr>
		</thead>
		<tbody>
			@foreach(\App\Model\SerialList::all() as $j)
			<tr>
				<td>{{ $j->SerialNo }}</td>
				<td>{{ $j->ItemInfo }}</td>
				<td>{{ $j->Parameter1 }}</td>
				<td>{{ $j->Parameter2 }}</td>
				<td>{{ $j->Type }}</td>
				<td>{{ $j->UsedFlag }}</td>
				<td>{{ Carbon\Carbon::parse($j->ExpireDate)->toDayDateTimeString() }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<form method="POST" action="{{ route('seriallist.store') }}" id="form" accept-charset="UTF-8" enctype="multipart/form-data">
		@csrf

		<div class="form-group row {{ $errors->has('SerialNo') ? ' has-error' : '' }}">
			{{ Form::label( 'sn', 'Serial No : ', ['class' => 'col-4 col-form-label text-right'] ) }}
			<div class="col-6">
				{{ Form::text('SerialNo', @$value, ['class' => 'form-control'.($errors->has('SerialNo') ? ' is-invalid' : NULL), 'id' => 'sn', 'placeholder' => 'Serial No']) }}
				@if ($errors->has('SerialNo'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('SerialNo') }}</strong>
				</span>
				@endif
			</div>
		</div>

		<div class="form-group row {{ $errors->has('ItemInfo') ? ' has-error' : '' }}">
			{{ Form::label( 'iteminf', 'Item Info : ', ['class' => 'col-4 col-form-label text-right'] ) }}
			<div class="col-6">
				{{ Form::text('ItemInfo', @$value, ['class' => 'form-control'.($errors->has('ItemInfo') ? ' is-invalid' : NULL), 'id' => 'iteminf', 'placeholder' => 'Item Info']) }}
				@if ($errors->has('ItemInfo'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('ItemInfo') }}</strong>
				</span>
				@endif
			</div>
		</div>

		<div class="form-group row {{ $errors->has('Parameter1') ? ' has-error' : '' }}">
			{{ Form::label( '1para', 'First Parameter : ', ['class' => 'col-4 col-form-label text-right'] ) }}
			<div class="col-6">
				{{ Form::text('Parameter1', @$value, ['class' => 'form-control'.($errors->has('Parameter1') ? ' is-invalid' : NULL), 'id' => '1para', 'placeholder' => 'First Parameter']) }}
				@if ($errors->has('Parameter1'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('Parameter1') }}</strong>
				</span>
				@endif
			</div>
		</div>

		<div class="form-group row {{ $errors->has('Parameter2') ? ' has-error' : '' }}">
			{{ Form::label( '2para', 'Second Parameter : ', ['class' => 'col-4 col-form-label text-right'] ) }}
			<div class="col-6">
				{{ Form::text('Parameter2', @$value, ['class' => 'form-control'.($errors->has('Parameter2') ? ' is-invalid' : NULL), 'id' => '2para', 'placeholder' => 'Second Parameter']) }}
				<span id="type"></span>
				@if ($errors->has('Parameter2'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('Parameter2') }}</strong>
				</span>
				@endif
			</div>
		</div>

		<fieldset class="form-group {{ $errors->has('Type') ? ' has-error' : '' }}">
			<div class="row">
				<legend class="col-form-label col-4 pt-0 text-right">Type :</legend>
				<div class="col-6">
					<div class="form-check">
						<input class="form-check-input {{ $errors->has('Type') ? ' is-invalid' : NULL }}" type="radio" name="Type" id="type1" value="1" {{ old('Type')?'checked':NULL }}>
							<label class="form-check-label" for="type1">True</label>
							@if ($errors->has('Type'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('Type') }}</strong>
							</span>
							@endif
					</div>
					<div class="form-check">
						<input class="form-check-input {{ $errors->has('Type') ? ' is-invalid' : NULL }}" type="radio" name="Type" id="type2" value="0" {{ old('Type')?'checked':NULL }}>
							<label class="form-check-label" for="type2">False</label>
							@if ($errors->has('Type'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('Type') }}</strong>
							</span>
							@endif
					</div>
				</div>
			</div>
		</fieldset>

		<fieldset class="form-group {{ $errors->has('UsedFlag') ? ' has-error' : '' }}">
			<div class="row">
				<legend class="col-form-label col-4 pt-0 text-right">Used Flag :</legend>
				<div class="col-6">
					<div class="form-check">
						<input class="form-check-input {{ $errors->has('UsedFlag') ? ' is-invalid' : NULL }}" type="radio" name="UsedFlag" id="uf1" value="0" {{ old('UsedFlag')?'checked':NULL }}>
							<label class="form-check-label" for="uf1">Not Yet</label>
							@if ($errors->has('UsedFlag'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('UsedFlag') }}</strong>
							</span>
							@endif
					</div>
					<div class="form-check">
						<input class="form-check-input {{ $errors->has('UsedFlag') ? ' is-invalid' : NULL }}" type="radio" name="UsedFlag" id="uf2" value="1" {{ old('UsedFlag')?'checked':NULL }}>
							<label class="form-check-label" for="uf2">Already Used</label>
							@if ($errors->has('UsedFlag'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('UsedFlag') }}</strong>
							</span>
							@endif
					</div>
				</div>
			</div>
		</fieldset>

		<div class="form-group row {{ $errors->has('ExpireDate') ? ' has-error' : '' }}">
			{{ Form::label( 'ed', 'Expiry Date : ', ['class' => 'col-4 col-form-label text-right'] ) }}
			<div class="col-6">
				{{ Form::text('ExpireDate', @$value, ['class' => 'form-control'.($errors->has('ExpireDate') ? ' is-invalid' : NULL), 'id' => 'ed', 'placeholder' => 'Expiry Date']) }}
				<span id="type"></span>
				@if ($errors->has('ExpireDate'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('ExpireDate') }}</strong>
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
// date
$('#ed').datetimepicker({
	format:'YYYY-MM-DD',
	useCurrent: true,
	minDate: moment().add(3, 'days').format('YYYY-MM-DD'),
})
.on('dp.change dp.show dp.update', function() {
	$('#form').bootstrapValidator('revalidateField', 'ExpireDate');
});

////////////////////////////////////////////////////////////////////////////////////
$.fn.dataTable.moment( 'ddd, MMM D, YYYY h:mm A' );
$('#serial').DataTable({
	"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
	"order": [[4, "desc" ]],	// sorting the 2nd column ascending
	// responsive: true
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
			SerialNo: {
				validators: {
					notEmpty: {
						message: 'This cannot be empty!'
					},
					remote: {
						type: 'GET',
						url:'{{ route('remote.serialnumber') }}',
						message: 'Please use another Serial Number. ',
						delay: 50
					},
				}
			},
			ItemInfo: {
				validators: {
					notEmpty: {
						message: 'Please choose. '
					},
				}
			},
			Parameter1: {
				validators: {
					notEmpty: {
						message: 'Please choose. '
					},
				}
			},
			Parameter2: {
				validators: {
					notEmpty: {
						message: 'Please choose. '
					},
				}
			},
			Type: {
				validators: {
					notEmpty: {
						message: 'Please choose. '
					},
				}
			},
			UsedFlag: {
				validators: {
					notEmpty: {
						message: 'Please choose. '
					},
				}
			},
			ExpireDate: {
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