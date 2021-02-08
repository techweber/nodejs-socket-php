<?php
error_reporting(E_ALL);
$port = 3000;
$address = '127.0.0.1';

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

if($socket===false){
	echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
}

$result = socket_connect($socket, $address, $port);

if($result===false){
	echo "socket_connect() failed: reason: ($result)" . socket_strerror(socket_last_error($socket)) . "\n";
}

$data = array('itemid' => '1234567', 'steamid' => '4592745827585', 'otherinfo' => 'hi there');

$encdata = json_encode($data);

socket_write($socket, $encdata, strlen($encdata));

socket_close($socket);

echo "Sent data\n";

?>