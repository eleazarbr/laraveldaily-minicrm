@extends('layouts.app')

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

					<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Website</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@if($companies->isEmpty())
						<tr>
							<td>No records found... <a href="{{route('companies.create')}}">Add a new company!</a></td>
						</tr>
						@else
						@foreach($companies as $company)
						<tr>
							<td> {{$company['first_name']}} </td>
							<td> {{$company['email']}} </td>
							<td> {{$company['website']}} </td>
							<td>
								<form method="POST" action="{{route('companies.destroy', ['id' => $company->id])}}">
									<a href="{{ route('companies.show', ['id' => $company->id]) }}" type="submit" class="btn btn-sm btn-success"> Show </a>
									<a href="{{ route('companies.edit', ['id' => $company->id]) }}" type="submit" class="btn btn-sm btn-primary"> Edit </a>
									<a href="#" data-record-id="{{$company->id}}" data-record-title="{{$company->first_name}}" data-toggle="modal" data-target="#confirm-delete" type="submit" class="btn btn-sm btn-danger">Delete</a>
									<!-- <button href="#" type="submit" class="btn btn-sm btn-danger">Delete</button> -->
								</form>
							</td>
						</tr>
						@endforeach
						@endif
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

</script>
@stop