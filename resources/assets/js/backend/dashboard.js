$(document).ready(function() {
	console.log("welcome");
	get_public_data();
});

var avatar = "";
var username = "";

function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}


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
	var new_username = data.msg.iduser.replace("+", " ");

	var new_html = '<li class="right clearfix">'+
	'<span class="chat-img pull-right" style="margin-left:10px;">'+
	'<img src="../resources/assets/image/'+data.msg.client_avatar+'" alt="User Avatar" class="img-circle" />'+
	'</span>'+
	'<div class="chat-body clearfix">'+
	'<div class="header">'+
	'<small class=" text-muted">'+
	'<span class="glyphicon glyphicon-time"></span>'+getDate()+''+
	'</small>'+
	'<strong class="pull-right primary-font">'+ new_username +'</strong>'+
	'</div>'+
	'<p>'+data.msg.message+'</p>'+
	'</div>'+
	'</li>';

	$("#section-chat").append(new_html);	
}

function sendMessage()
{
	if (open == false) 
	{
		alert("Connection is lost please reload the page or contact administrator");
	}
	else
	{

		var new_username = username.replace("+", " ");

		var val_msg = $("#textbox-msg").val();
		socket.send(JSON.stringify({
			msg : {
				message : val_msg,
				iduser : getCookie("username_login"),
				client_avatar : avatar,
			},
		}));

		var new_html = '<li class="right clearfix">'+
		'<span class="chat-img pull-right" style="margin-left:10px;">'+
		'<img src="../resources/assets/image/'+avatar+'" alt="User Avatar" class="img-circle" />'+
		'</span>'+
		'<div class="chat-body clearfix">'+
		'<div class="header">'+
		'<small class=" text-muted">'+
		'<span class="glyphicon glyphicon-time"></span>'+getDate()+''+
		'</small>'+
		'<strong class="pull-right primary-font">  '+new_username+'</strong>'+
		'</div>'+
		'<p>'+val_msg+'</p>'+
		'</div>'+
		'</li>';

		$("#section-chat").append(new_html);	
		$('#textbox-msg').val("");
	}
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

function get_public_data()
{
	$.ajax({
		url: '../backend/public_data',
		method: 'get',
		dataType: 'json',
		success: function(data){
			console.log("======================================================="); 
			console.log('succes: ',data);
			console.log("======================================================="); 
			avatar = data.avatar;
			username = data.username;

		},
		error: function(XMLHttpRequest, textStatus, errorThrown) { 
			console.log("======================================================="); 
			console.log("Status: " + textStatus); 
			console.log("Error: " + errorThrown); 
			console.log("======================================================="); 
			alert("something when wrong");
		} 
	});
}

