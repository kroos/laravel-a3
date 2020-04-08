@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>Download</h1>
	</div>
	<div class="card-body">
			@include('layouts.info')
			@include('layouts.errorform')
			@include('forum.download._index')
	</div>
</div>
@endsection

@section('js')

@endsection