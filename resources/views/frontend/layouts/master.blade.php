<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/common.css') }}">
    
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/app.css') }}">
    <title>Loanbazar | @yield('title') </title>

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800&display=swap" rel="stylesheet">

</head>
<body>
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0" nonce="BnacPt9b"></script>
{{-- header part --}}
        @include('frontend.includes.header')
{{-- header part --}}

    <main class="main">
        @yield('content')
    </main>

    <footer class="lb__footer">
        @include('frontend.includes.footer')
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="{{ asset('/frontend/assets/js/jquery.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('/frontend/assets/js/plugins.js') }}"></script>
    {{-- <script src="{{ asset('/frontend/assets/js/wow.min.js') }}"></script> --}}
    <script src="{{ asset('/frontend/assets/js/theme.js') }}"></script>
    @stack('scripts')
    <script src="{{ asset('/frontend/assets/js/app.js') }}"></script>
</body>
</html>