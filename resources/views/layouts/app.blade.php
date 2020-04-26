<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name=description content="Content">
	<meta name=author content="Zaugola">
	<!-- <title>{{ config('app.name') }}</title> -->
	<title>{{ config('app.name') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
	<meta name="description" content="This is an {{ config('app.name') }} to modify their character" />
	<meta name="keywords" content="A3, A3 online, a3 online game, a3 private server, a3 game, free online game, free private server, free a3, free a3 game online, revive, a3 revive, revive online game, free a3 revive" />

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<?php

		// htmlScriptTagJsApi([
		// 'action' => 'homepage',
		// 'callback_then' => 'callbackThen',
		// 'callback_catch' => 'callbackCatch'
		// ])
?>

</head>
<body class="d-flex flex-column">
	<div id="app">
		@include('layouts.nav')

		<main class="py-4">
			<div class="container-fluid">
				<div class="row justify-content-center">
					{{-- <div class="col-12 animated flipInY delay-5s"> --}}
					<div class="col-12">

						@yield('content')

					</div>
				</div>
			</div>
		</main>
	</div>
	<footer class="mt-auto  py-4 bg-dark text-white-50  sticky-top ">
		<div class="container-fluid">
			<div class="row">
				<div class="col-4">
					<div><img src="{{ asset('images/logo-149x103.png') }}" class="img-fluid rounded" width="10%" alt="logo">
						<span class="font-weight-bold">{{ config('app.name') }} - All Rights Reserved</span> <br>
						<span>&copy; Copyright {{ \Carbon\Carbon::now()->format('Y') }}</span>
					</div>
				</div>
				<div class="col-4">
					<p class="text-center">Author : <a href="http://forum.ragezone.com/members/294574.html" target="_blank">Zaugola</a></p>
				</div>

				<div class="col-4">
					<span class="font-weight-bold">Sign up for Updates!</span>
					<form action="#" method="post">
						<div class="form-control bg-light">
							<label><small class="font-weight-bold">E-Mail:
								<input type="text" name="eMail" id="eMail" autocomplete="email" placeholder="Enter you E-Mail!" pattern="" required>
							</small></label>
							<input class="btn btn-primary btn-sm" type="submit" name="submit" id="submit" value="Subscribe">
						</div>
					</form>
				</div>
			</div>
		</div>
	</footer>
	@include('cookieConsent::index')

	<!-- Scripts -->
	
	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('js/ckeditor/adapters/jquery.js') }}"></script>

	<script type="text/javascript" src="{{ asset('js/datetime-moment.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('js/dataTable-any-number.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('js/select2-dropdownPosition.js') }}" ></script>

	@include('layouts.jscript')
</body>
</html>
