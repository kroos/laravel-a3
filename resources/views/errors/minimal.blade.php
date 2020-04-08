@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header"><h1>Error @yield('code')</h1></div>
	<div class="card-body">
		<p>@yield('message')</p>
			<p class="text-center">
				<img src="{{ asset('images/404.png') }}" class="img-fluid rounded jumbotron" alt="Error @yield('code')">
			</p>
		<a href="{{ app('router')->has('home') ? route('home') : url('/') }}">
			<button class="bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg">
				{{ __('Go Home') }}
			</button>
		</a>
	</div>
</div>
@endsection

@section('js')
/////////////////////////////////////////////////////////////////////////////////////////
//ucwords
$("#username").keyup(function() {
	uch(this);
});

/////////////////////////////////////////////////////////////////////////////////////////
@endsection

