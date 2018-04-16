@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Create employee</div>

				<div class="panel-body">
					<form class="form-horizontal" method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
						{{ csrf_field() }}

						@if($errors->has('error'))
							<span class="help-block text-center">
								<strong>{{$errors->first()}}</strong>
							</span>
						@endif

						<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">Name</label>

							<div class="col-md-6">
								<input id="name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" autofocus>

								@if ($errors->has('first_name'))
									<span class="help-block">
										<strong>{{ $errors->first('first_name') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
							<label for="last_name" class="col-md-4 control-label">Last name</label>

							<div class="col-md-6">
								<input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" autofocus>

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
								<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

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
								<input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">

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
								<input id="company_id" type="text" class="form-control" name="company_id">

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
									Back
								</a>
								<button type="submit" class="btn btn-primary">
									Register
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
