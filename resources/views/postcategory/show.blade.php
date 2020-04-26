@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1 class="float-left">{!! $postCategory->category !!}</h1>
		@auth
		<h3 class="float-right">
			<a href="{{ route('post.create', 'category_id='.$postCategory->id) }}" class="btn btn-primary">Post {!! $postCategory->category !!}</a>
		</h3>
		@endauth
	</div>
	<div class="card-body">
			@include('layouts.info')
			@include('layouts.errorform')
			@include('postcategory._show')
	</div>
</div>
@endsection

@section('js')

@endsection