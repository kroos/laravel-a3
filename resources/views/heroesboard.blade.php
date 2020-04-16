@extends('layouts.app')

@section('content')
<?php
use Carbon\Carbon;

?>
<div class="card">
	<div class="card-header">
		<h1><blink>Heroes Board</blink></h1>
	</div>
	<div class="card-body">
	@include('layouts.info')
	@include('layouts.errorform')

		<div class="col-12 align-center table-responsive">

			<table id="playeronline" class="table table-hover" width="100%">
				<thead>
					<th>Hero</th>
					<th>Type</th>
					<th>Level</th>
					<th>Nation</th>
					<th>Rebirth Level</th>
					<th>Rank</th>
					<th>Date Login</th>
				</thead>
				<tbody>
					@foreach($h as $h1)
<?php
if ($h1->nat == 0) {
	$on = 'Temoz';
} else {
	$on = 'Quanato';
}
?>
					<tr>
						<td>{{ $h1->char }}</td>
						<td>{{ config('a3.hero'.$h1->type) }}</td>
						<td>{{ $h1->level }}</td>
						<td>{{ $on }}</td>
						<td>{{ $h1->rb }}</td>
						<td>{{ config('a3.rank'.$h1->rank) }}</td>
						<td>{{ Carbon::parse($h1->dlogin)->toDayDateTimeString() }}</td>
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