debugger;

//filename = './fd_getMovers.js';


var page = require('webpage').create();
page.settings.userAgent = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36';

page.onConsoleMessage = function(msg) {
    console.log(msg);
};
// not working, try a simpler example
//page.open('http://finance.yahoo.com/stock-center/?bypass=true', function(status) {
page.open('http://finance.yahoo.com/stock-center/?bypass=true#mod_85ac7b2b_640f_323f_a1c1_00b2f4865d18-tab1', function(status) {
    //page.injectJs(filename);
    // Check for page load success
    if (status !== "success") {
        console.log("Unable to access network");
    } else {
        // Wait for 'signin-dropdown' to be visible
        console.log("before waitfor");
        waitFor({
    
    check: function () {
        return page.evaluate(function() {            
            var el = document.getElementById("yui_3_18_1_1_1489035035128_389");
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


  
  
