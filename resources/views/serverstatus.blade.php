@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>Server Status</h1>
	</div>
	<div class="card-body">
	@include('layouts.info')
	@include('layouts.errorform')

<?php

$fp1 = @fsockopen(config('a3.srvip'), config('a3.svrportaccount'), $errno, $errstr, 3);
if (!$fp1) {
		$acc_port = 'danger';
		// echo "ERROR: $errno - $errstr<br />\n";
	} else {
		$acc_port = 'success';
	};
// fclose($fp1);

$fp2 = @fsockopen(config('a3.srvip'), config('a3.svrportbattle'), $errno, $errstr, 3);
if (!$fp2) {
		$battle_port = 'danger';
		// echo "ERROR: $errno - $errstr<br />\n";
	} else {
		$battle_port = 'success';
	};
// fclose($fp2);

$fp3 = @fsockopen(config('a3.srvip'), config('a3.svrportlogin'), $errno, $errstr, 3);
if (!$fp3) {
		$login_port = 'danger';
		// echo "ERROR: $errno - $errstr<br />\n";
	} else {
		$login_port = 'success';
	};
// fclose($fp3);

$fp4 = @fsockopen(config('a3.srvip'), config('a3.svrportZone'), $errno, $errstr, 3);
if (!$fp4) {
		$zone_port = 'danger';
		// echo "ERROR: $errno - $errstr<br />\n";
	} else {
		$zone_port = 'success';
	};
// fclose($fp4);
	if ($fp1 == true && $fp2 == true && $fp3 == true && $fp4 == true) {
		$svronline = 'success';
		$svrstatus = 'online';
	} else {
		$svronline = 'danger';
		$svrstatus = 'offline';
	}
	
?>

		<div class="row ">
			<div class="col-3 p-3 mb-2 bg-{{ $acc_port }} text-white rounded-pill text-center">Account Server</div>
			<div class="col-3 p-3 mb-2 bg-{{ $battle_port }} text-white rounded-pill text-center">Battle Server</div>
			<div class="col-3 p-3 mb-2 bg-{{ $login_port }} text-white rounded-pill text-center">Login Server</div>
			<div class="col-3 p-3 mb-2 bg-{{ $zone_port }} text-white rounded-pill text-center">Zone Server</div>
		</div>
		<h3 class="text-center">Overall, {{ config('app.name') }} is <span class="text-{{ $svronline }}">{{ $svrstatus }}</span></h3 class="text-center">
	</div>
</div>
@endsection

@section('js')

@endsection