<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/syndron/demo/vertical/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Feb 2022 14:49:25 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('admin/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('admin/assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('admin/assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
	@stack('css')
	<link href="{{ asset('admin/assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('admin/assets/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('admin/assets/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('admin/assets/css/header-colors.css') }}" />
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
	<title>Loanbazar - @yield('title')</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		@include('admin.includes.sidebar')
		@include('admin.includes.header')
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				@yield('content')
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		{{-- footer section --}}
		@include('admin.includes.footer')
	</div>
	<!--end wrapper-->

	<!-- Bootstrap JS -->
	<script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>

	@stack('js')

	<script src="{{ asset('admin/assets/js/index.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('admin/assets/js/app.js') }}"></script>
    <script src="{{ asset('js/iziToast.js') }}"></script>
	@include('vendor.lara-izitoast.toast')
</body>


<!-- Mirrored from codervent.com/syndron/demo/vertical/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Feb 2022 14:49:54 GMT -->
</html>
