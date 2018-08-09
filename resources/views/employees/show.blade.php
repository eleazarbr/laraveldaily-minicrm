@extends('layouts.app')
@section('title', 'Show employee')

@section('content')
<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2> {{ $employee->first_name }} </h2>
			</div>

               <div class="body">
                   <form class="form-horizontal">
                       <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                           <label for="name" class="col-md-4 control-label">First Name</label>
                           <div class="col-md-6">
								<div class="form-line">
	                               <input readonly id="name" type="text" class="form-control" name="first_name" value="{{ $employee['first_name'] }}" autofocus>
								</div>
						   </div>
                       </div>
                       <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
						<label for="name" class="col-md-4 control-label">Last Name</label>
						<div class="col-md-6">
							<div class="form-line">
								<input readonly id="name" type="text" class="form-control" name="last_name" value="{{ $employee['last_name'] }}">
							</div>
						</div>
					</div>
                       <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                           <label for="email" class="col-md-4 control-label">Email Address</label>
                           <div class="col-md-6">
								<div class="form-line">
	                               <input  readonly id="email" type="email" class="form-control" name="email" value="{{ $employee['email'] }}">
								</div>
						   </div>
                       </div>
					<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
						<label for="phone" class="col-md-4 control-label">Phone</label>
						<div class="col-md-6">
							<div class="form-line">
								<input readonly id="phone" type="text" class="form-control" name="phone" value="{{ $employee['phone'] }}">
							</div>
						</div>
					</div>
					 <div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">
						<label for="company_id" class="col-md-4 control-label">Company</label>
						<div class="col-md-6">
							<div class="form-line">
							   <input readonly id="phone" type="text" class="form-control" name="company_id" value="{{$employee->company['first_name']}}">
							</div>
						</div>
					</div>
                       <div class="form-group">
                           <div class="col-md-6 col-md-offset-4">
                               <a href="{{ route('employees.index') }}" type="submit" class="btn btn-info">
                                   Back
                               </a>
                           </div>
                       </div>
                   </form>
            </div>
        </div>
    </div>
</div>
@endsection
