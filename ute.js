debugger;

//filename = './fd_getMovers.js';


var page = require('webpage').create();
page.settings.userAgent = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36';

page.onConsoleMessage = function(msg) {
    console.log(msg);
};
// not working, try a simpler example
//page.open('http://finance.yahoo.com/stock-center/?bypass=true', function(status) {
page.open('https://www.msn.com/en-us/money/markets/marketmovers', function(status) {
    //page.injectJs(filename);
    // Check for page load success
    if (status !== "success") {
        console.log("Unable to access network");
        phantom.exit();
    } else {
        // Wait for 'signin-dropdown' to be visible
        console.log("before waitfor");
        waitFor({
    
    check: function () {
        return page.evaluate(function() {            
            var el = document.getElementById("actives");
            var style = window.getComputedStyle(el);
             //console.log("just before waitfor return", document.getElementById("nav-tv"));
             if (!style){
                   return false; 
             }else{
                return (style.display !== 'none');
             }
            
            
        });
    },
    success: function () {
        
        var title = page.evaluate(function() {
            var el = document.getElementById("actives");
            console.log(el);
    return document.title;
  });
  console.log('Page title is ' + title);
  phantom.exit();
    },
    error: function () {
        console.log("error in waitfor");
        phantom.exit();
    } // optional
    
});
       
    }
});


 function waitFor ($config) {
    $config._start = $config._start || new Date();

    if ($config.timeout && new Date - $config._start > $config.timeout) {
        if ($config.error) $config.error();
        if ($config.debug) console.log('timedout ' + (new Date - $config._start) + 'ms');
        return;
    }

    if ($config.check()) {
        if ($config.debug) console.log('success ' + (new Date - $config._start) + 'ms');
        return $config.success();
    }

    setTimeout(waitFor, $config.interval || 0, $config);
}


  
  
