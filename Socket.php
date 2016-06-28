<?php

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Http\Controllers\Backend\ChatController;

require  'vendor/autoload.php';
$server = IoServer::factory(
	new HttpServer(
		new WsServer(
			new ChatController()
			)
		),
	5000
	);

$server->run();
?>
