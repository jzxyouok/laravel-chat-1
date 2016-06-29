 <!DOCTYPE html>
<html>
<head>
<title>Friend Chat</title>

<link href="{{ asset('resources/assets/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('resources/assets/css/font-awesome.css') }}" rel="stylesheet">
@yield('include_css_content')
</head>
<body class="blue">
	@yield('content')
</body>
<script src="{{ asset('resources/assets/js/jquery-2.2.0.min.js') }}"></script>
<script src="{{ asset('resources/assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('resources/assets/js/show_foto.js') }}"></script>
@yield('include_js_content')
</html>