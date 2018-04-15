@extends('layouts.app')

@section('content')

<!-- <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header title">
            </div>
            <div class="modal-body">
                Are you sure you want to continue? This action is irreversible!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" id="delete-btn" class="btn btn-danger btn-ok">Delete</button>
            </div>
        </div>
    </div>
</div> -->

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
						<a href="{{ route('companies.create') }}" type="submit" class="btn btn-primary">
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
						@foreach($companies as $company)
						<tr>
							<td> {{$company['first_name']}} </td>
							<td> {{$company['email']}} </td>
							<td> {{$company['website']}} </td>
							<td>
								<form method="POST" action="{{route('companies.destroy', ['id' => $company->id])}}">
									<a href="{{ route('companies.edit', ['id' => $company->id]) }}" type="submit" class="btn btn-sm btn-primary"> Edit </a>
									{{ method_field('DELETE')}} {{csrf_field()}}
									<button href="#" type="submit" class="btn btn-sm btn-danger">Delete</button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
