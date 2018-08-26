@extends('layouts.app')
@section('title', 'Employees')

@section('content')

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header title">
			</div>
			<div class="modal-body">
			{{trans('front.actions.delete_warning')}}
			</div>
			<div class="modal-footer">
				<form id="delete-form" method="POST">
				<button type="button" class="btn btn-default" data-dismiss="modal">{{trans('front.actions.cancel')}}</button>
				{{ method_field('DELETE')}} {{csrf_field()}}
				<button type="submit" id="delete-btn" class="btn btn-danger">{{trans('front.actions.cancel_ok')}}</button>
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
				{{trans('front.employees.employees')}}
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
					{{trans('front.employees.new')}}
					</a>
				</div>

				<hr>
				<table class="table table table-striped table-bordered" style="width:100%" id="employees-dt">
					<thead>
						<tr>
							<th>{{trans('front.employees.name')}}</th>
							<th>{{trans('front.employees.company')}}</th>
							<th>{{trans('front.employees.email')}}</th>
							<th>{{trans('front.employees.phone')}}</th>
							<th>{{trans('front.employees.actions')}}</th>
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
				return ' <a type="submit" href="/employees/'+row.id+'" class="btn btn-sm btn-success"> {{trans('front.actions.show')}} </a> <a type="submit" href="/employees/'+row.id+'/edit" class="btn btn-sm btn-primary"> {{trans('front.actions.edit')}} </a> <a type="submit" href="#" class="btn btn-sm btn-danger" data-record-id="'+row.id+'" data-record-title="'+row.first_name+'" data-toggle="modal" data-target="#confirm-delete"> {{trans('front.actions.delete')}} </a>'
			}},
		],
		lengthChange : true,
	});
</script>
@stop
