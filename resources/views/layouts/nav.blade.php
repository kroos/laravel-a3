<?php
use Carbon\Carbon;
use Carbon\CarbonPeriod;
?>
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top navbar-laravel" style="background-color: #e3f2fd;">
	<div class="container">
		<a class="navbar-brand" href="{{ url('/') }}">
			<img src="{{ asset('images/logo2.png') }}" alt="{{ config('app.name') }}" title="{{ config('app.name') }}" class="img-fluid rounded" width="50%">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<!-- Left Side Of Navbar -->
			<ul class="navbar-nav mr-auto"></ul>

			<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ml-auto">
				<!-- Authentication Links -->
			@guest
				<li class="nav-item">
					<a class="nav-link" href="{{ route('login') }}">Login</a>
				</li>
				@if (Route::has('register'))
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}">Register</a>
					</li>
				@endif
			@else

				<li class="nav-item">
					<a class="nav-link" href="">Fault Report</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="">Switches Access</a>
				</li>
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="btn btn-sm btn-info text-white nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ \Auth::user()->c_sheadera }}
<!-- 						<span class="badge badge-danger">{{ __('$allleaves') }}</span>
						<span class="caret"></span>
 -->					</a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ __('route(staff.create)') }}">Create New Member</a>
						<a class="dropdown-item" href="{{ __('route(profile.edit, \Auth::user()->c_sheadera)') }}">Profile</a>
						<a class="dropdown-item" href="{{ __('route(change_password, \Auth::user()->id)') }}">Change Password</a>

						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>

					</div>
				</li>
			@endguest
			</ul>
		</div>
	</div>
</nav>