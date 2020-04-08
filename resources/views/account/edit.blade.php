@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header"><h1 class="card-title">Edit Profile</h1></div>
	<div class="card-body">
		@include('layouts.info')
		@include('layouts.errorform')
		{!! Form::model( $account, ['route' => ['account.update', $account->c_id], 'method' => 'PATCH', 'id' => 'form', 'files' => true]) !!}
			@include('account._edit')
		{{ Form::close() }}
	</div>
</div>
@endsection

@section('js')
/////////////////////////////////////////////////////////////////////////////////////////
// table


/////////////////////////////////////////////////////////////////////////////////////////
// bootstrap validator

$('#form').bootstrapValidator({
	fields: {
		c_sheadera: {
            validators: {
                stringLength: {
                    min: 4,
                    message: 'The name should be greater than 4. '
                },
                notEmpty: {
                    message: 'Please input your name. '
                },
            }
		},
		c_headerb: {
            validators: {
                notEmpty: {
                    message: 'Please insert your valid email. '
                },
                regexp: {
                    regexp: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                    message: 'Please insert your valid email address. '
                },
				// remote: {
				//     type: 'GET',
				//     url:'{{ route('remote.emailusername') }}',
				//     message: 'Please use another email. ',
				//     delay: 50
				// },
            }
		},

	}
});

/////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////
@endsection