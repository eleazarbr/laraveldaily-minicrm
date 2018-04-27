@extends('layouts.app')

@section('content')

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header title">
			</div>
			<div class="modal-body">
				Are you sure you want to continue? This action is irreversible and will eliminate all the related employees!
			</div>
			<div class="modal-footer">
				<form id="delete-form" method="POST">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				{{ method_field('DELETE')}} {{csrf_field()}}
				<button type="submit" id="delete-btn" class="btn btn-danger">Yes, I want to delete it!</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Companies</div>

				<div class="panel-body">
					@if (session('success'))
						<div class="alert alert-success" role="alert">
							{{ session('success') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					@endif
					<div class="text-left">
						<a href="{{ route('companies.create') }}" type="submit" class="btn btn-primary btn-flat margin-bottom-1">
							+ New company
						</a>
					</div>

					<hr>
					<table class="table table table-striped table-bordered" style="width:100%" id="companies-dt">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Website</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>

	$('#confirm-delete').on('show.bs.modal', function(e) {
		var data = $(e.relatedTarget).data();
		var route = "/companies/"+data.recordId;

		$('.title', this).text('Confirm delete ' + data.recordTitle);
		$('#delete-form').attr('action', route);
	});

	/**
	 * Companies DataTable
	 */
	$('#companies-dt').DataTable({
		ajax : '/companies?ws=getCompanies',
		columns : [
			{data: 'first_name', name: 'first_name'},
			{data: 'email', name: 'email'},
			{data: 'website', name: 'website'},
			{data: 'actions', render : function (data, type, row) {
				return ' <a type="submit" href="/companies/'+row.id+'" class="btn btn-sm btn-success"> Show </a> <a type="submit" href="/companies/'+row.id+'/edit" class="btn btn-sm btn-primary"> Edit </a> <a type="submit" href="#" class="btn btn-sm btn-danger" data-record-id="'+row.id+'" data-record-title="'+row.first_name+'" data-toggle="modal" data-target="#confirm-delete"> Delete </a>'
			}},
		],
		lengthChange : true,
	});
</script>
@stop