@extends('backend_layout')
@section('backend_include_css_content')
<link href="{{ asset('resources/assets/css/backend/dashboard.css') }}" rel="stylesheet">
@stop

@section('backend_content')
<section class="col-md-12 blue">
    <nav class="my-nav navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <b class="navbar-brand" href=""><i class="fa fa-home">&nbsp;Dash</i>board</b>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{ route('logout') }}"><i class="fa fa-mail-forward"></i>&nbsp;Log Out</a></li>
          </ul>
      </div>
  </nav>
</section>
<section style="min-height:608px;">
    <div class="col-md-12" style="padding-top: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-comment"></span> Chat
                        </div>
                        <div class="panel-body">
                            <ul class="chat" id="section-chat">
                            </ul>
                        </div>
                        <div class="panel-footer">
                            <div class="input-group">
                                <input id="textbox-msg" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="btn-chat" onclick="sendMessage()">
                                        Send
                                    </button>
                                </span>
                            </div>
                            <div class="file_button_container" width="100%"><input type="file" /></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="col-md-12 col-sm-12 col-xs-12 footer">
    <h5>Copyright 2016</h5>
</section>
@stop

@section('backend_include_js_content')	
<script src="{{ asset('resources/assets/js/backend/dashboard.js') }}"></script>
@stop

<style type="text/css">
   .file_button_container,
   .file_button_container input {
     height: 47px;
     width: 263px;
 }

 .file_button_container {
     background: transparent url(http://i.stack.imgur.com/BT5AB.png) left top no-repeat;
 }

 .file_button_container input {
     opacity: 0;
 }
</style>