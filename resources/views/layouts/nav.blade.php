<?php
use Carbon\Carbon;
use Carbon\CarbonPeriod;
?>
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top navbar-laravel" style="background-color: #e3f2fd;">
	<div class="container">
		<a class="navbar-brand" href="{{ url('/') }}">
			<img src="{{ asset('images/logo-149x103.png') }}" alt="{{ config('app.name') }}" title="{{ config('app.name') }}" class="img-fluid rounded" width="50%">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<!-- Left Side Of Navbar -->
			<ul class="navbar-nav mr-auto">
			@guest
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="btn btn-sm btn-info rounded-pill text-white nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Public News <i class="fas fa-rss"></i></a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('news') }}">News <i class="fas fa-newspaper"></i></a>
						<a class="dropdown-item" href="{{ route('announcement') }}">Announcement <i class="fas fa-bullhorn"></i></a>
						<a class="dropdown-item" href="{{ route('download') }}">Download <i class="fas fa-download"></i></a>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="btn btn-sm btn-info rounded-pill text-white nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Server Info <i class="fas fa-info-circle"></i></a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('serverstatus') }}">Server Status <i class="far fa-lightbulb"></i></a>
						<a class="dropdown-item" href="{{ route('playeronline') }}">Player Online <i class="fas fa-plug"></i></a>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="btn btn-sm btn-info rounded-pill text-white nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Hall Of Fame <i class="fas fa-rss"></i></a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('heroesboard') }}">Board Of Heroes <i class="fas fa-newspaper"></i></a>
						<a class="dropdown-item" href="{{ route('mercboard') }}">Board Of Mercenaries <i class="fas fa-bullhorn"></i></a>
					</div>
				</li>

			@else
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="btn btn-sm btn-info rounded-pill text-white nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Public News <i class="fas fa-rss"></i></a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('usernews') }}">News <i class="fas fa-newspaper"></i></a>
						<a class="dropdown-item" href="{{ route('announcement') }}">Announcement <i class="fas fa-bullhorn"></i></a>
						<a class="dropdown-item" href="{{ route('download') }}">Download <i class="fas fa-download"></i></a>
					</div>
				</li>
			@endguest
			</ul>

			<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ml-auto">
				<!-- Authentication Links -->
			@guest
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="btn btn-sm btn-info rounded-pill text-white nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>User Login & Registration <i class="far fa-user"></i></a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('login') }}">Sign In <i class="fas fa-sign-in-alt"></i></a>
						@if (Route::has('register'))
						<a class="dropdown-item" href="{{ route('register') }}">Sign Up <i class="fas fa-user-plus"></i></a>
						@endif
					</div>
				</li>

<!-- 				<li class="nav-item">
					<a class="nav-link" href="{{ route('login') }}">Sign In <i class="fas fa-sign-in-alt"></i></a>
				</li>
				@if (Route::has('register'))
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}">Sign Up <i class="fas fa-user-plus"></i></a>
					</li>
				@endif -->
			@else

<!-- 				<li class="nav-item">
					<a class="nav-link" href="">Fault Report</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="">Switches Access</a>
				</li> -->
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="btn btn-sm btn-info rounded-pill text-white nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ \Auth::user()->c_sheadera }}
						<span class="badge badge-danger">1</span>
						<span class="caret"></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('account.index') }}">Profile <i class="fas fa-user-circle"></i></a>
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Off <i class="fas fa-sign-out-alt"></i></a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>

					</div>
				</li>
			@endguest
			</ul>
		</div>
	</div>
</nav>