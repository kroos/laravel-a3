@extends('layouts.app')

@section('content')
<?php
use Carbon\Carbon;

?>
<div class="card">
	<div class="card-header">
		<h1><blink>Mercenaries Board</blink></h1>
	</div>
	<div class="card-body">
	@include('layouts.info')
	@include('layouts.errorform')

		<div class="col-12 align-center table-responsive">

			<table id="playeronline" class="table table-hover" width="100%">
				<thead>
					<th>Hero</th>
					<th>Mercenary</th>
					<th>Type</th>
					<th>Level</th>
					<th>Rebirth Level</th>
					<th>Rank</th>
				</thead>
				<tbody>
					@foreach($m as $h1)
					<tr>
						<td>{{ $h1->MasterName }}</td>
						<td>{{ $h1->HSName }}</td>
						<td>{{ config('a3.merc'.$h1->Type) }}</td>
						<td>{{ $h1->HSLevel }}</td>
						<td>{{ $h1->rb }}</td>
						<td>{{ config('a3.mrank'.$h1->reset_rb) }}</td>
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