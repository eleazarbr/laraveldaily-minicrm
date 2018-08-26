@extends('layouts.app')
@section('title', 'Edit company')

@section('content')
<div class="row clreafix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2> {{trans('front.actions.edit')}} {{ $company->first_name }} </h2>
			</div>
			<div class="body">
				<form class="form-horizontal" method="POST" action="{{ route('companies.update', $company->id) }}" enctype="multipart/form-data">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
						<label for="name" class="col-md-4 control-label">{{trans('front.companies.name')}}</label>
						<div class="col-md-6">
							<div class="form-line">
								<input id="name" type="text" class="form-control" name="first_name" value="{{ $company['first_name'] }}" autofocus>
							</div>
							@if ($errors->has('first_name'))
								<span class="help-block">
									<strong>{{ $errors->first('first_name') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="email" class="col-md-4 control-label">{{trans('front.companies.email')}}</label>
						<div class="col-md-6">
							<div class="form-line">
								<input id="email" type="email" class="form-control" name="email" value="{{ $company['email'] }}">
							</div>
							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
						<label for="logo" class="col-md-4 control-label">{{trans('front.companies.logo')}}</label>
						<div class="col-md-6">
							<div class="card" style="width: 18rem;">
								<img class="card-img-top img-responsive" src="{{asset('storage/logo/'.$company['logo'])}}" alt="">
								<div class="card-body">
									<div class="form-line">
										<input id="logo" type="file" name="logo" multiple>
									</div>
								</div>
							</div>
							@if ($errors->has('logo'))
								<span class="help-block">
									<strong>{{ $errors->first('logo') }}</strong>
								</span>
							@endif
						</div>
					</div>
					 <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
						<label for="website" class="col-md-4 control-label">{{trans('front.companies.website')}}</label>
						<div class="col-md-6">
							<div class="form-line">
								<input id="website" type="text" class="form-control" name="website" value="{{$company['website']}}">
							</div>
							@if ($errors->has('website'))
								<span class="help-block">
									<strong>{{ $errors->first('website') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<a href="{{ route('companies.index') }}" type="submit" class="btn btn-info">
							{{trans('front.actions.cancel')}}
							</a>
							<button type="submit" class="btn btn-primary">
							{{trans('front.actions.update')}}
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
