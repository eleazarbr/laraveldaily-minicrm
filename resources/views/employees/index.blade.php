@extends('layouts.app')
@section('title', 'Employees')

@section('content')

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header title">
			</div>
			<div class="modal-body">
				Are you sure you want to continue? This action is irreversible!
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

<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>
					Employees
				</h2>
			</div>

			<div class="body">
				@if (session('success'))
					<div class="alert alert-success" role="alert">
						{{ session('success') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				@endif
				<div class="text-left">
					<a href="{{ route('employees.create') }}" type="submit" class="btn btn-primary">
						+ New employee
					</a>
				</div>

				<hr>
				<table class="table table table-striped table-bordered" style="width:100%" id="employees-dt">
					<thead>
						<tr>
							<th>Name</th>
							<th>Company</th>
							<th>Email</th>
							<th>Phone</th>
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
@endsection

@section('scripts')
<script>

	$('#confirm-delete').on('show.bs.modal', function(e) {
		var data = $(e.relatedTarget).data();
		var route = "/employees/"+data.recordId;

		$('.title', this).text('Confirm delete ' + data.recordTitle);
		$('#delete-form').attr('action', route);
	});

	/**
	 * Employees DataTable
	 */
	$('#employees-dt').DataTable({
		ajax : '/employees?ws=getEmployees',
		columns : [
			{data: 'fullname', name: 'name'},
			{data: 'company.first_name', name: 'company'},
			{data: 'email', name: 'email'},
			{data: 'phone', name: 'phone'},
			{data: 'actions', render : function (data, type, row) {
				return ' <a type="submit" href="/employees/'+row.id+'" class="btn btn-sm btn-success"> Show </a> <a type="submit" href="/employees/'+row.id+'/edit" class="btn btn-sm btn-primary"> Edit </a> <a type="submit" href="#" class="btn btn-sm btn-danger" data-record-id="'+row.id+'" data-record-title="'+row.first_name+'" data-toggle="modal" data-target="#confirm-delete"> Delete </a>'
			}},
		],
		lengthChange : true,
	});
</script>
@stop
