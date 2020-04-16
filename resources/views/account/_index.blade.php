<div class="container">
	<div class="row">
		<div class="col-4 text-right">
			Username :
		</div>
		<div class="col-8">
			{{ Auth::user()->c_id }}
		</div>
		<div class="col-4 text-right">
			Name :
		</div>
		<div class="col-8">
			{{ Auth::user()->c_sheadera }}
		</div>

		<div class="col-4 text-right">
			Email :
		</div>
		<div class="col-8">
			{{ Auth::user()->c_headerb }}
		</div>
		<div class="col-4 text-right">
			Member Of :
		</div>
		<div class="col-8">
			{{ Auth::user()->belongsToRoles()->first()->role }}
		</div>
		<div class="col-4 text-right">
			Date Join :
		</div>
		<div class="col-8">
			{{ \Carbon\Carbon::parse(Auth::user()->d_cdate)->toDayDateTimeString() }}
		</div>
@if( App\Model\Account::whereIn('c_sheaderb', [1, 2, 3, 4]) )
		<div class="col-4 text-right">
			Salary Date :
		</div>
		<div class="col-8">
			{{ \Carbon\Carbon::parse(Auth::user()->salary)->toDayDateTimeString() }}
		</div>
		<div class="col-4 text-right">
			Last Salary Taken On :
		</div>
		<div class="col-8">
			{{ \Carbon\Carbon::parse(Auth::user()->last_salary)->toDayDateTimeString() }}
		</div>
		<div class="col-4 text-right">
			Salary Amount :
		</div>
		<div class="col-8">
			{{ number_format(config('a3.'.Auth::user()->c_sheaderb)) }} Wz
		</div>

@endif
	</div>
	<div class="col-12">
		<span class="btn btn-danger float-right" id="deactivate" data-c_id="{!! \Auth::user()->c_id !!}">Deactivate Account</span>
	</div>
</div>