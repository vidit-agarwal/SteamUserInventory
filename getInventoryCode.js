const li = require("steam-inventory");
var http = require('http');
var fs = require('fs');

http.createServer(function(req, res){
	
	li("76561198306639779", 730, 2, (items, error) => {
  	if(error) {
    		return console.log("Error, while getting user items. Please check settings or user inventory is hidden.");
  	} 
  	else {
    	//console.log(JSON.stringify(items)) ;
    	res.writeHead(200, {'Content-Type': 'application/json'} );
        res.write(JSON.stringify(items));
        res.end();
  	}
	});

  
}).listen(8000);