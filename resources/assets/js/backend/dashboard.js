$(document).ready(function() {


});

var socket = new WebSocket("ws://127.0.0.1:5000");
var open =  false;

function getDate()
{
	var d = new Date();
	d.getHours();
	d.getMinutes();
	d.getSeconds();
	return d;
}

function addMessage(data)
{

	var new_html = '<li class="right clearfix">'+
	'<span class="chat-img pull-right">'+
	'<img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />'+
	'</span>'+
	'<div class="chat-body clearfix">'+
	'<div class="header">'+
	'<small class=" text-muted">'+
	'<span class="glyphicon glyphicon-time"></span>'+getDate()+''+
	'</small>'+
	'<strong class="pull-right primary-font">'+  +'</strong>'+
	'</div>'+
	'<p>'+data.msg.message+'</p>'+
	'</div>'+
	'</li>';

	$("#section-chat").append(new_html);	
}

function sendMessage()
{
	var val_msg = $("#textbox-msg").val();
	socket.send(JSON.stringify({
		msg : {
			message : val_msg,
			iduser : val_msg,
			file : val_msg,
		},
	}));

	var new_html = '<li class="right clearfix">'+
	'<span class="chat-img pull-right">'+
	'<img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />'+
	'</span>'+
	'<div class="chat-body clearfix">'+
	'<div class="header">'+
	'<small class=" text-muted">'+
	'<span class="glyphicon glyphicon-time"></span>'+getDate()+''+
	'</small>'+
	'<strong class="pull-right primary-font">Me</strong>'+
	'</div>'+
	'<p>'+val_msg+'</p>'+
	'</div>'+
	'</li>';

	$("#section-chat").append(new_html);	
	$('#textbox-msg').val("")
}


socket.onopen =  function(){
	open= true;
	console.log("Connection is open");

}

socket.onmessage =  function(evt){
	var data = JSON.parse(evt.data);
	addMessage(data);
	console.log("data",data);
}

socket.onclose =  function(){
	open= false;
	console.log("Connection is close");	
}

$("#textbox-msg").keypress(function(e) {
	if(e.which == 13) {
		console.log('You pressed enter!');
		sendMessage();
	}
});








