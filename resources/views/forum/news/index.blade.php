@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>News</h1>
	</div>
	<div class="card-body">
			@include('layouts.info')
			@include('layouts.errorform')
			@include('forum.news._index')
	</div>
</div>
@endsection

@section('js')

@endsection