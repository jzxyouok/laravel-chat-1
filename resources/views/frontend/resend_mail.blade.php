@extends('frontend_layout')
@section('include_css_content')
<link href="{{ asset('resources/assets/css/frontend/login.css') }}" rel="stylesheet">
@stop
@section('content')
<section class="sec-login">
	<div class="container">
		<div class="row">
			<div class='col-md-4'></div>
			<div class="col-md-4">
				<div class="login-container">
					<legend>Sign Up</legend>
					<div class="col-md-12" style="margin:10px;" align="center">
						@if(Session::has('message'))
						{{ Session::get('message') }}
						@endif
					</div>
					{{ Form::open(array('route' => 'resend')) }}
					<div class="form-group mymargin-top" align="left">
						<label>email :</label>
						{{ Form::text('email' , '', array('class'=>'form-control', 'placeholder'=>'admin@mail.com')) }}
						@if($errors->has('email'))
						{{ $errors->first('email') }}
						@endif
					</div>
					<div class="form-group" style="margin-bottom:15px;" align="center">
						{{ Form::submit('Request Email', array('class'=>'btn btn-success')) }}
					</div>
					<div class="form-group">
						<p class="text-center m-t-xs text-sm"><b>Back To Register?</b></p> 
						<a href="{{ route('register') }}" class="btn btn-success btn-block m-t-md">Register</a>
					</div>
					{{ Form::close() }}
				</div>
			</div>
			<div class='col-md-4'></div>
		</div>
	</div>
</section>
@stop