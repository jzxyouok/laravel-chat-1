<!DOCTYPE html>
<html>
<head>
	<title>Chat Pages</title>
	<link href="{{ asset('resources/assets/css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('resources/assets/css/font-awesome.css') }}" rel="stylesheet">
	@yield('backend_include_css_content')
</head>
<body>
	@yield('backend_content')
	<script src="{{ asset('resources/assets/js/jquery-2.2.0.min.js') }}"></script>
	<script src="{{ asset('resources/assets/js/bootstrap.js') }}"></script>
	@yield('backend_include_js_content')
</body>
</html>