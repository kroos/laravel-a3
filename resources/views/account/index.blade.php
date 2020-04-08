@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1 class="float-left">Profile</h1>
		<h3 class=" float-right">
			<a href="{{ route('account.edit', \Auth::user()->c_id) }}" class="btn btn-primary">Edit Profile</a>
		</h3>
	</div>
	<div class="card-body">
			@include('layouts.info')
			@include('layouts.errorform')
			@include('account._index')
	</div>
</div>
@endsection

@section('js')

/////////////////////////////////////////////////////////////////////////////////////////
// sweetalert2 delete sibling

$(document).on('click', '#deactivate', function(e){
	var accId = $(this).data('c_id');
	SwalDeactivate(accId);
	e.preventDefault();
});

function SwalDeactivate(accId){
	swal.fire({
		title: 'Are you sure?',
		text: "It will be deactivate your account!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, deactivate it!',
		showLoaderOnConfirm: true,
		allowOutsideClick: false,

		preConfirm: function()                {
			return new Promise(function(resolve) {
				$.ajax({
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					url: '{{ url('account') }}' + '/' + accId,
					type: 'DELETE',
					data:	{
								id: accId,
								_token : $('meta[name=csrf-token]').attr('content')
							},
					dataType: 'json'
				})
				.done(function(response){
					swal.fire('Deactivated!', response.message, response.status);
					// $('#delete_sibling_' + accId).parent().parent().remove();
				})
				.fail(function(){
					swal.fire('Oops...', 'Something went wrong with ajax!', 'error');
				});
			});
		},
	})
	.then((result) => {
		if(result.dismiss === swal.DismissReason.cancel) {
			swal.fire('Cancelled', 'Your data is safe', 'info');
		}
	});
}

/////////////////////////////////////////////////////////////////////////////////////////

@endsection