@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>Mercenary Rebirth<h1>
	</div>
	<div class="card-body">
	@include('layouts.info')
	@include('layouts.errorform')

	{!! Form::model($mercenary_rebirth, ['route' => ['mercenaryrebirth.update', $mercenary_rebirth->c_id], 'method' => 'PATCH', 'id' => 'form', 'files' => true]) !!}


	<h6>This is where you should rebirth your mercenary. Click on your hero and then click on your mercenary corresponded to your hero. Thats it.<br>Have fun tanking medusa with your mercenary!!</h6>

					<table class="table table-sm table-hover">
						<thead>
							<tr>
								<th scope="col">Rebirth</th>
								<th scope="col">Mercenary Level</th>
								<th scope="col">Wz Needed</th>
							</tr>
						</thead>
						@for ($i = config('a3.merclvlrb'); $i <= 300; $i=$i+10)
<?php
				$rbirthmerc = ($i - config('a3.merclvlrb')) / 10 ;
				$rbirthwz = config('a3.mercwzrb') * ($rbirthmerc);
?>
							<tr>
							<td>{{ $rbirthmerc }}</td>
							<td>{{ $i }}</td>
							<td>{{ $rbirthwz }} wz</td>
							</tr>
						@endfor
					</table>


		@if($mercenary_rebirth->hasmanycharac()->where('c_status', 'A')->count() > 0)

			<div class="form-group row {{ $errors->has('c_id') ? ' has-error' : '' }}">
				<label for="hero" class="col-4 col-form-label pt-0 text-right">Hero :</label>
				<div class="col-6">
					<select name="c_id" class="form-control {{ $errors->has('c_id') ? 'is-invalid' : NULL }}" id="hero">
						<option value="">Please Choose</option>
						@foreach($mercenary_rebirth->hasmanycharac()->where('c_status', 'A')->get() as $char)
						<option value="{{ $char->c_id }}">{{ $char->c_id }}</option>
						@endforeach
					</select>
					@if ($errors->has('c_id'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('c_id') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group row {{ $errors->has('HSID') ? ' has-error' : '' }}">
				<label for="merc" class="col-4 col-form-label pt-0 text-right">Mercenary :</label>
				<div class="col-6">
					<select name="HSID" class="form-control {{ $errors->has('HSID') ? 'is-invalid' : NULL }}" id="merc">
						<option value="">Please Choose</option>
						@foreach($mercenary_rebirth->hasmanycharac()->where('c_status', 'A')->get() as $char)
							@foreach($char->hasmanyhstable()->where('HSState', 1)->whereNull('DelDate')->get() as $merc)
								<option value="{{ $merc->HSID }}" class="{{ $merc->MasterName }}">{{ $merc->HSName }}</option>
							@endforeach
						@endforeach
					</select>
					@if ($errors->has('HSID'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('HSID') }}</strong>
					</span>
					@endif
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