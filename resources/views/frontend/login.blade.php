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
					<legend><b>Sign In</b></legend>
					<div class="col-md-12" align="center">
						@if(Session::has('message'))
						{{ Session::get('message') }}
						@endif
					</div>
					{{ Form::open(array('route' => 'login/auth','class' => 'login')) }}
					<div class="form-group mymargin-top" align="left">
						{{ Form::text('email' , '', array('class'=>'form-control', 'placeholder'=>'admin@mail.com')) }}
						@if($errors->has('email'))
						{{ $errors->first('email') }}
						@endif
					</div>
					<div class="form-group" align="left">
						{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'*************')) }}
						@if($errors->has('password'))
						{{ $errors->first('password') }}
						@endif
					</div>
					<div class="form-group mymargin-bottom" align="center">
						{{ Form::submit('Login', array('class'=>'btn btn-success')) }}
					</div>
					<div class="form-group">
						<p class="text-center m-t-xs text-sm"><b>Do not have an account? please contact your administrator</b></p> 
					</div>
					{{ Form::close() }}
				</div>
			</div>
			<div class='col-md-4'></div>
		</div>
	</div>
</section>
@stop












