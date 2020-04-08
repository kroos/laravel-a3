@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>Welcome to {{ config('app.name') }}</h1>
	</div>
	<div class="card-body">
			@include('layouts.info')
			@include('layouts.errorform')
		<div class="container">
			<div class="row">
				<img src="{{ asset('images/jumbotron.jpg') }}" class="img-fluid rounded mx-auto d-block jumbotron" alt="{{ config('app.name') }}">
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-6 justify-content-center">
					<h3 class="text-center"><i class="fas fa-user"></i>&nbsp;Account :&nbsp;{{ \App\Model\Account::where('c_status', 'A')->get()->count() }}</h3>
				</div>
				<div class="col-6 justify-content-center">
					<h3 class="text-center"><i class="fas fa-user"></i>&nbsp;Character :&nbsp;{{ \App\Model\Charac0::where('c_status', 'A')->get()->count() }}</h3>
				</div>
			</div>
		</div>
		<p>&nbsp;</p>
		<div class="container">
			<div class="row">
				<div class="col-10 mx-auto">

					Say something here which i dont have any idea.

				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="container">
					<div class="col-12">



					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')

@endsection