<!DOCTYPE html>
<html>
<head>
	<title>OutplacementHeros</title>
	{{--<script defer src="{{ asset('js/app.js') }}"></script>--}}
	@yield('loginLinks')
	@yield('select2css')
		<style>
				.pagination.center,
				.pagination.center ul {
					float: left;
					position: relative;
				}
				.pagination.center { left: 50%; }
				.pagination.center ul { left: -50%; }
		</style>
	@include('../partials.head')
	@yield('extra_css')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css" rel="stylesheet" />	
</head>
<body>

	@include('../partials.nav')

	@yield('content')
	

	@include('../partials.footer')

	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	 @yield('jsplugins')

		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
		<script src="{{asset('js/script.js')}}"></script>
	
		<!-- toastr JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
		<script src="{{ asset('js/app.js') }}"></script>


</body>
</html>