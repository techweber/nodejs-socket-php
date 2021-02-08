var net = require('net');
var listenport = 3000;

var Server = net.createServer(function(Sock){
	console.log("Client Connected");
	Sock.on('data',function(data){
		console.log('Data received : ' + data);
		var dataobj = JSON.parse(data);
		console.log('Item ID: ' + dataobj.itemid);
		console.log('Steam ID: ' + dataobj.steamid);
		console.log('Other Info: ' + dataobj.otherinfo);
	});
	Sock.on('end',function(){
		console.log('Client Disconnected');
	});
	Sock.pipe(Sock);


});

Server.listen(listenport,function(){
	console.log('Listening on port: ' + listenport);
});