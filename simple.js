var page = require('webpage').create();
page.open('http://finance.yahoo.com/stock-center/?bypass=true', function () {
    console.log(page.content);
    phantom.exit();
});