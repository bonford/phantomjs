var page = require('webpage').create();
page.open('http://finance.yahoo.com/stock-center/?bypass=true', function(status) {
  console.log("Status: " + status);
  if(status === "success") {
	  var doc = page.evaluate(function() {
		 
    return document;
	 
  });
   // page.render('example.png');
 
  }
  console.log(page.plainText);
   
  phantom.exit();
});
