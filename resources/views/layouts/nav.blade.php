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
						@foreach(\App\Model\PostCategory::all() as $pc)
							<a class="dropdown-item" href="{{ route('postCategory.show', $pc->id) }}">{!! $pc->category !!}</a>
						@endforeach
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
					<a id="navbarDropdown" class="btn btn-sm btn-info rounded-pill text-white nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Hall Of Fame <i class="fas fa-mask"></i></a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('heroesboard') }}">Board Of Heroes <i class="fas fa-male"></i></a>
						<a class="dropdown-item" href="{{ route('mercboard') }}">Board Of Mercenaries <i class="fas fa-people-arrows"></i></a>
					</div>
				</li>

			@else
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="btn btn-sm btn-info rounded-pill text-white nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Public News <i class="fas fa-rss"></i></a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						@foreach(\App\Model\PostCategory::all() as $pc)
							<a class="dropdown-item" href="{{ route('postCategory.show', $pc->id) }}">{!! $pc->category !!}</a>
						@endforeach
					</div>
				</li>

				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="btn btn-sm btn-info rounded-pill text-white nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Game Master Editing Account <i class="far fa-user-circle"></i></a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('account.index') }}">Account Info <i class="fas fa-user-circle"></i></a>
						<a class="dropdown-item" href="{{ route('account.index') }}">Changing Account Type <i class="fas fa-user-circle"></i></a>
						<a class="dropdown-item" href="{{ route('account.index') }}">Paid Membership <i class="fas fa-user-circle"></i></a>
						<a class="dropdown-item" href="{{ route('account.index') }}">List of Paid Membership <i class="fas fa-user-circle"></i></a>
						<a class="dropdown-item" href="{{ route('account.index') }}">Ban Account <i class="fas fa-user-circle"></i></a>
						<a class="dropdown-item" href="{{ route('account.index') }}">Unban Account <i class="fas fa-user-circle"></i></a>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="btn btn-sm btn-info rounded-pill text-white nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Game Master Editing Character
						<svg class="bi bi-archive-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM6 7a.5.5 0 000 1h4a.5.5 0 000-1H6zM.8 1a.8.8 0 00-.8.8V3a.8.8 0 00.8.8h14.4A.8.8 0 0016 3V1.8a.8.8 0 00-.8-.8H.8z" clip-rule="evenodd"/>
						</svg>
					</a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('account.index') }}">Character Altering Points <i class="fas fa-user-circle"></i></a>
						<a class="dropdown-item" href="{{ route('account.index') }}">Mercenary Altering Points <i class="fas fa-user-circle"></i></a>
						<a class="dropdown-item" href="{{ route('account.index') }}">Equip Equipment And Passive Skill <i class="fas fa-user-circle"></i></a>
						<a class="dropdown-item" href="{{ route('account.index') }}">Mercenary Equip Equipment <i class="fas fa-user-circle"></i></a>
						<a class="dropdown-item" href="{{ route('account.index') }}">Equip Super Super Shue <i class="fas fa-user-circle"></i></a>
						<a class="dropdown-item" href="{{ route('account.index') }}">Learn Episode 5 Skill <i class="fas fa-user-circle"></i></a>
						<a class="dropdown-item" href="{{ route('account.index') }}">Altering Level <i class="fas fa-user-circle"></i></a>
						<a class="dropdown-item" href="{{ route('account.index') }}">Mercenary Altering Level <i class="fas fa-user-circle"></i></a>
						<a class="dropdown-item" href="{{ route('account.index') }}">Inserting Lore <i class="fas fa-user-circle"></i></a>
						<a class="dropdown-item" href="{{ route('account.index') }}">Grace Of Silbadu Insertion <i class="fas fa-user-circle"></i></a>
						<a class="dropdown-item" href="{{ route('account.index') }}">Inserting 1 Box of Items <i class="fas fa-user-circle"></i></a>
						<a class="dropdown-item" href="{{ route('account.index') }}">Inserting 1 Item <i class="fas fa-user-circle"></i></a>
						<a class="dropdown-item" href="{{ route('account.index') }}">Character Clone <i class="fas fa-user-circle"></i></a>
						<a class="dropdown-item" href="{{ route('account.index') }}">Guild Removal <i class="fas fa-user-circle"></i></a>
						<a class="dropdown-item" href="{{ route('account.index') }}">Info PK <i class="fas fa-user-circle"></i></a>
						<a class="dropdown-item" href="{{ route('account.index') }}">Altering PK timer <i class="fas fa-user-circle"></i></a>
						<a class="dropdown-item" href="{{ route('account.index') }}">Inserting Items Manually <i class="fas fa-user-circle"></i></a>
						<a class="dropdown-item" href="{{ route('account.index') }}">Character Reset Rebirth <i class="fas fa-user-circle"></i></a>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="btn btn-sm btn-info rounded-pill text-white nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>VIP Member <i class="fas fa-user-tie"></i></a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('salary.edit', \Auth::user()->c_id) }}">Salary <i class="fas fa-hand-holding-usd"></i></a>
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
					<a id="navbarDropdown" class="btn btn-sm btn-info rounded-pill text-white nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Management <i class="fas fa-user-cog"></i></a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('off.edit', \Auth::user()->c_id) }}">Offline Town Portal <i class="fas fa-street-view"></i></a>
						<a class="dropdown-item" href="{{ route('asshue.edit', \Auth::user()->c_id) }}">Acquire Super Shue <i class="fab fa-earlybirds"></i></a>
						<a class="dropdown-item" href="{{ route('bas.edit', \Auth::user()->c_id) }}">Buy All Skill <i class="fab fa-superpowers"></i></a>
						<a class="dropdown-item" href="{{ route('esssh.edit', \Auth::user()->c_id) }}">Equip Super Super Shue <i class="fas fa-dove"></i></a>
						<a class="dropdown-item" href="{{ route('buylore.edit', \Auth::user()->c_id) }}">Buy Lore <i class="fas fa-diagnoses"></i></a>
						<a class="dropdown-item" href="{{ route('herorebirth.edit', \Auth::user()->c_id) }}">Hero Rebirth <i class="fas fa-praying-hands"></i></a>
						<a class="dropdown-item" href="{{ route('heroresetrebirth.edit', \Auth::user()->c_id) }}">Hero Reset Rebirth <i class="fas fa-praying-hands"></i></a>
						<a class="dropdown-item" href="{{ route('mercenaryrebirth.edit', \Auth::user()->c_id) }}">Mercenary Rebirth <i class="fas fa-pray"></i></a>
						<a class="dropdown-item" href="{{ route('mercenaryresetrebirth.edit', \Auth::user()->c_id) }}">Mercenary Reset Rebirth <i class="fas fa-pray"></i></a>
						<a class="dropdown-item" href="{{ route('heropoints.edit', \Auth::user()->c_id) }}">Adding Hero Stat Points <i class="fas fa-dumbbell"></i></a>
						<a class="dropdown-item" href="{{ route('mercenarypoints.edit', \Auth::user()->c_id) }}">Adding Mercenary Stat Points <i class="fas fa-dumbbell"></i></a>
					</div>
				</li>

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