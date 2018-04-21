@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Edit {{ $employee->first_name }}</div>

				<div class="panel-body">
					<form class="form-horizontal" method="POST" action="{{ route('employees.update', $employee->id) }}">
						{{ csrf_field() }}
						{{ method_field('PUT') }}

						<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">First Name</label>

							<div class="col-md-6">
								<input id="name" type="text" class="form-control" name="first_name" value="{{ $employee['first_name'] }}" autofocus>

								@if ($errors->has('first_name'))
									<span class="help-block">
										<strong>{{ $errors->first('first_name') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">Last Name</label>

							<div class="col-md-6">
								<input id="name" type="text" class="form-control" name="last_name" value="{{ $employee['last_name'] }}">

								@if ($errors->has('last_name'))
									<span class="help-block">
										<strong>{{ $errors->first('last_name') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-4 control-label">Email Address</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control" name="email" value="{{ $employee['email'] }}">

								@if ($errors->has('email'))
									<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
							<label for="phone" class="col-md-4 control-label">Phone</label>

							<div class="col-md-6">
								<input id="phone" type="text" class="form-control" name="phone" value="{{ $employee['phone'] }}">

								@if ($errors->has('phone'))
									<span class="help-block">
										<strong>{{ $errors->first('phone') }}</strong>
									</span>
								@endif
							</div>
						</div>

						 <div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">
							<label for="company_id" class="col-md-4 control-label">Company</label>

							<div class="col-md-6">
								<select class="form-control" name="company_id">
									@foreach($companies as $company)
										@if($company->id == $employee->company_id)
											<option selected value="{{$company->id}}"> {{$company->first_name}} </option>
										@else
											<option value="{{$company->id}}"> {{$company->first_name}} </option>
										@endif
									@endforeach
								</select>
								@if ($errors->has('company_id'))
									<span class="help-block">
										<strong>{{ $errors->first('company_id') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<a href="{{ route('employees.index') }}" type="submit" class="btn btn-info">
									Cancel
								</a>
								<button type="submit" class="btn btn-primary">
									Update
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
