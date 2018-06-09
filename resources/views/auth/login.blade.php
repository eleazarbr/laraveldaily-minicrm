@extends('layouts.login')

@section('content')
<div class="login-box">
	<div class="logo">
		<a href="">{{config('app.name')}}</b></a>
		<small>Admin BootStrap Based - Material Design</small>
	</div>
	<div class="card">
		<div class="body">
			<form id="sign_in" method="POST" action=" {{route('login')}} ">
				{{ csrf_field() }}
				<div class="msg">Sign in to start your session</div>
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="material-icons">person</i>
						</span>
						<div class="form-line">
							<input type="email" class="form-control" name="email" placeholder="Email" required autofocus>

						</div>
						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="material-icons">lock</i>
						</span>
						<div class="form-line">
							<input type="password" class="form-control" name="password" placeholder="Password" required>
						</div>
						@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-xs-8 p-t-5">
						<input type="checkbox" name="remember" id="remember" class="filled-in chk-col-pink">
						<label for="remember">Remember Me</label>
					</div>
					<div class="col-xs-4">
						<button class="btn btn-block bg-pink waves-effect" type="submit">Login</button>
					</div>
				</div>
				<div class="row m-t-15 m-b--20">
					<!-- <div class="col-xs-6">
						<a href="sign-up.html">Register Now!</a>
					</div> -->
					<div class="col-xs-6 align-right">
						<a href="{{ route('password.request') }}">Forgot Password?</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
