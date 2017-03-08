debugger;

filename = './fd_getMovers.js';


var page = require('webpage').create();
page.onConsoleMessage = function(msg) {
    console.log(msg);
};
// not working, try a simpler example
page.open('http://finance.yahoo.com/stock-center/?bypass=true', function(status) {
    page.injectJs(filename);
    // Check for page load success
    if (status !== "success") {
        console.log("Unable to access network");
    } else {
        // Wait for 'signin-dropdown' to be visible
        waitFor(function() {
            // Check in the page if a specific element is now visible
            return page.evaluate(function() {
                return document.getElementById("yui3-css-stamp");
            });
        }, function() {
           console.log("The gainers tab should be visible now");
           phantom.exit();
        });
    }
});
  
  
