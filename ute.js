debugger;

filename = './fd_getMovers.js';


var page = require('webpage').create();
/*
page.onResourceRequested = function (req) {
    console.log('requested: ' + JSON.stringify(req, undefined, 4));
};

page.onResourceReceived = function (res) {
    console.log('received: ' + JSON.stringify(res, undefined, 4));
};
*/
page.open('http://finance.yahoo.com/stock-center/?bypass=true', function(status) {
    page.injectJs(filename);
  console.log("Status: " + status);
  if(status === "success") {
	  var doc = page.evaluate(function() {
          var movers = getMovers();
          testLog();
          console.log(movers);
		 
    return document;
	 
  });
   // page.render('example.png');
 
  }
  
  //console.log(page.plainText);
   
  phantom.exit();
});
