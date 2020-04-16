@extends('layouts.app')

@section('content')
<?php
use Carbon\Carbon;

?>
<div class="card">
	<div class="card-header">
		<h1><blink>Player Online</blink></h1>
	</div>
	<div class="card-body">
	@include('layouts.info')
	@include('layouts.errorform')

		<div class="col-12 align-center table-responsive">

			<table id="playeronline" class="table table-hover" width="100%">
				<thead>
					<th>Heroes</th>
					<th>Level</th>
					<th>Rebirth Level</th>
					<th>Rank</th>
					<th>Date Login</th>
				</thead>
				<tbody>
					@foreach($q as $h)
					<tr>
						<td>{{ $h->c_id }}</td>
						<td>{{ $h->c_sheaderc }}</td>
						<td>{{ $h->rb }}</td>
						<td>{{ config('a3.rank'.$h->times_rb) }}</td>
						<td>{{ Carbon::parse($h->d_udate)->toDayDateTimeString() }}</td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tfoot>
			</table>

		</div>


	</div>
</div>
@endsection

@section('js')

$.fn.dataTable.moment( 'ddd, MMM D, YYYY h:mm A' );
$('#playeronline').DataTable({
	"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
	"order": [[4, "desc" ]],	// sorting the 2nd column ascending
	// responsive: true
});

@endsection