@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>List Of Paid Membership<h1>
	</div>
	<div class="card-body">
	@include('layouts.info')
	@include('layouts.errorform')

	<h6>List Of Paid Membership</h6>

											<table class="table table-hover" id="info">
												<thead>
													<tr>
														<th>Username</th>
														<th>Password</th>
														<th>Type</th>
														<th>Salary</th>
														<th>Salary Taken</th>
														<th>Hero</th>
														<th>Level</th>
														<th>Wz</th>
														<th>Rebirth</th>
														<th>Rebirth Times</th>
													</tr>
												</thead>
											</table>

	</div>
</div>
@endsection

@section('js')
////////////////////////////////////////////////////////////////////////////////////
// table
$.fn.dataTable.moment( 'ddd, D MMM YYYY' );
$('#info').DataTable({
	"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
	"order": [[5, "asc" ]],	// sorting the 2nd column ascending
	// responsive: true
	"ajax": {
		"url": '{{ route('listofpaidmembership.index') }}',
		"type": "POST",
		'data': {
			'_token' : $('meta[name=csrf-token]').attr('content'),
		},
	},
	"columns": [
		{"data": "username"},
		{"data": "password"},
		{"data": "type"},
		{"data": "salary"},
		{"data": "lastsalary"},
		{"data": "hero"},
		{"data": "level"},
		{"data": "wz"},
		{"data": "rebirth"},
		{"data": "rebirth_times"},
	],
});


////////////////////////////////////////////////////////////////////////////////////
// form validator
	$('#form').bootstrapValidator({
			feedbackIcons: {
			valid: '',
			invalid: '',
			validating: ''
		},
		fields: {
			c_id: {
				validators: {
					notEmpty: {
						message: 'This cannot be empty!'
					},
				}
			},
		}
//	})
//	.find('[name="post"]')
//	.ckeditor()
//	.editor
//	// To use the 'change' event, use CKEditor 4.2 or later
//	.on('change', function(e) {
//		// Revalidate the bio field
//		$('#form').bootstrapValidator('revalidateField', 'post');
//		// console.log( $('#postmessage').val() );
	});

////////////////////////////////////////////////////////////////////////////////////
@endsection