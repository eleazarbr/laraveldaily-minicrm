<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title> @yield('title') - {{ config('app.name') }}</title> 
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

	<link href="{{mix('/css/app.css')}}" rel="stylesheet" type="text/css">
</head>

<body class="theme-red">
	<div id="app">
		<header>
			@include('layouts._partials.navigation')
		</header>

		@include('layouts._partials.page-loader')
		@include('layouts._partials.left-sidebar')
		@include('layouts._partials.footer')
		@include('layouts._partials.right-sidebar')

		@yield('content')
	</div>

	<!-- Scripts -->
	<script src=" {{mix('/js/app.js')}} "></script>

	@yield('scripts')

</body>
</html>
