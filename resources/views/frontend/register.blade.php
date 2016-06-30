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
					{{ Form::open(array('route' => 'register/submit', 'files' => true)) }}
					<div class="form-group mymargin-top" align="left">
						{{ Form::text('name' , '', array('class'=>'form-control', 'placeholder'=>'admin')) }}
						@if($errors->has('name'))
						<span style="color:red">{{ $errors->first('name') }}</span>
						@endif
					</div>
					<div class="form-group" align="left">
						{{ Form::text('email' , '', array('class'=>'form-control', 'placeholder'=>'admin@mail.com')) }}
						@if($errors->has('email'))
						<span style="color:red">{{ $errors->first('email') }}</span>
						@endif
					</div>
					<div class="form-group" align="left">
						{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'*************')) }}
						@if($errors->has('password'))
						<span style="color:red">{{ $errors->first('password') }}</span>
						@endif
					</div>
					<div class="form-group">
						<label>Photo :</label>
						<input type="file" name="file" id="pick_file" class="form-control" required />
						@if($errors->has('file'))
						<span style="color:red">{{ $errors->first('file') }}</span>
						@endif
					</div>
					<div style="margin-bottom:15px;">
						<img src="{{asset('resources/assets/image')}}/no_photo.png" id="show_file" style="height:75px;width:75px;">
					</div>
					<div class="form-group" style="margin-bottom:15px;" align="center">
						{{ Form::submit('Register', array('class'=>'btn btn-success')) }}
					</div>
					<div class="form-group">
						<p class="text-center m-t-xs text-sm"><b>Not Recieve Email? or Back to <a href="{{route('login')}}">Login</a></b></p> 
						<a href="{{ route('request_mail') }}" class="btn btn-success btn-block m-t-md">Request Mail</a>
					</div>
					{{ Form::close() }}
				</div>
			</div>
			<div class='col-md-4'></div>
		</div>
	</div>
</section>
@stop












