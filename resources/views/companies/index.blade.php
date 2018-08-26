@extends('layouts.app')

@section('title', 'Companies')
@section('content')

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header title">
			</div>
			<div class="modal-body">
				{{trans('front.actions.delete_warning_company')}}
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
					{{trans('front.companies.companies')}}
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
					<a href="{{ route('companies.create') }}" type="submit" class="btn btn-primary btn-flat margin-bottom-1">
						{{trans('front.companies.new')}}
					</a>
				<hr>
				<table class="table table table-striped table-bordered" style="width:100%" id="companies-dt">
					<thead>
						<tr>
							<th>{{trans('front.companies.name')}}</th>
							<th>{{trans('front.companies.email')}}</th>
							<th>{{trans('front.companies.website')}}</th>
							<th>{{trans('front.companies.actions')}}</th>
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
				return ' <a type="submit" href="/companies/'+row.id+'" class="btn btn-sm btn-success"> {{trans('front.actions.show')}} </a> <a type="submit" href="/companies/'+row.id+'/edit" class="btn btn-sm btn-primary"> {{trans('front.actions.edit')}} </a> <a type="submit" href="#" class="btn btn-sm btn-danger" data-record-id="'+row.id+'" data-record-title="'+row.first_name+'" data-toggle="modal" data-target="#confirm-delete"> {{trans('front.actions.delete')}} </a>'
			}},
		],
		lengthChange : true,
	});
</script>
@stop
