 <!DOCTYPE html>
<html>
<head>
<title>Company Profile</title>

<link href="{{ asset('resources/assets/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('resources/assets/css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('resources/assets/css/frontend/creative.css') }}" rel="stylesheet">
<link href="{{ asset('resources/assets/css/frontend/magnific-popup.css') }}" rel="stylesheet">
@yield('include_css_content')
</head>
<body id="page-top">
	@include('frontend.layout.header')
	@yield('content')
	@include('frontend.layout.footer')
</body>
<script src="{{ asset('resources/assets/js/jquery-2.2.0.min.js') }}"></script>
<script src="{{ asset('resources/assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('resources/assets/js/frontend/creativ.js') }}"></script>
<script src="{{ asset('resources/assets/js/frontend/jquery_easing.min.js') }}"></script>
<script src="{{ asset('resources/assets/js/frontend/scrollreveal.min.js') }}"></script>
<script src="{{ asset('resources/assets/js/frontend/jquery.fittext.js') }}"></script>
<script src="{{ asset('resources/assets/js/frontend/jquery.magnific-popup.min.js') }}"></script>
@yield('include_js_content')
</html>