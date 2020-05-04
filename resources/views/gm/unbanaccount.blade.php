@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>Unban Account<h1>
	</div>
	<div class="card-body">
	@include('layouts.info')
	@include('layouts.errorform')

	<h6>Unban Account</h6>

	<table class="table table-hover" id="info">
		<thead>
			<tr>
				<th>Username</th>
				<th>Password</th>
				<th>Name</th>
				<th>Type</th>
				<th>Email</th>
				<th>Hero</th>
				<th>Level</th>
				<th>Wz</th>
				<th>Rebirth</th>
				<th>Rank</th>
				<th>#</th>
			</tr>
		</thead>
		<tbody>
		@foreach( App\Model\Account::where(['c_status' => 'X', 'c_sheaderc' => 'ban_account'])->get() as $k )
		@foreach($k->hasmanycharac()->where('c_status', 'A')->get() as $v)
			<tr>
				<td>{!! $k->c_id !!}</td>
				<td>{!! $k->c_headera !!}</td>
				<td>{!! $k->c_sheadera !!}</td>
				<td>{!! $k->belongsToRoles->role !!}</td>
				<td>{!! $k->c_headerb !!}</td>
				<td>{!! $v->c_id !!}</td>
				<td>{!! $v->c_sheaderc !!}</td>
				<td>{!! $v->c_headerc !!}</td>
				<td>{!! $v->rb !!}</td>
				<td>{!! config('a3.rank'.$v->times_rb) !!}</td>
				<td><span class="text-success unban" data-id="{!! $k->c_id !!}" title="Unban"><i class="fas fa-lock-open"></i></span></td>
			</tr>
		@endforeach
		@endforeach
		</tbody>
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
});

////////////////////////////////////////////////////////////////////////////////////
// ajax post inactive
$(document).on('click', '.unban', function(e){
	var sRinact = $(this).data('id');
	SwalInactiveSR(sRinact);
	e.preventDefault();
});

function SwalInactiveSR(sRinact){
	swal.fire({
		title: 'Unban Account',
		text: 'Are you sure you want to unban this account?',
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Unban',
		showLoaderOnConfirm: true,

		preConfirm: function() {
			return new Promise(function(resolve) {
				$.ajax({
					url: '{{ route('liftban.store') }}',
					type: 'POST',
					data: {
							_token : $('meta[name=csrf-token]').attr('content'),
							c_id: sRinact,
					},
					dataType: 'json'
				})
				.done(function(response){
					swal.fire('Approved!', response.message, response.status)
					.then(function(){
						window.location.reload(true);
					});
					//$('#delete_logistic_' + sRinact).parent().parent().remove();
				})
				.fail(function(jqXHR){
					swal('Oops...', jqXHR.responseJSON.message, 'error');
				})
			});
		},
		allowOutsideClick: false			  
	})
	.then((result) => {
		if (result.dismiss === swal.DismissReason.cancel) {
			swal.fire('Cancelled', 'Unban Account', 'info')
		}
	});
}


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