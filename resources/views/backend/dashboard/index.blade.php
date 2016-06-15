@extends('backend_layout')
@section('admibackend_include_css_content')
<link href="{{ asset('resources/assets/css/backend/admin/dashboard.css') }}" rel="stylesheet">
@stop

@section('backend_content')


<?php 
echo $list_data;
?>


@stop

@section('backend_include_js_content')	
<script src="{{ asset('resources/assets/js/backend/admin/dashboard.js') }}"></script>
@stop