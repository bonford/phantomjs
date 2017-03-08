

    function testLog() {
        console.log("log tested");
    }

    function getMovers() {
        var rootDiv = document.getElementById("mod_85ac7b2b_640f_323f_a1c1_00b2f4865d18-tab1");
        var companies = rootDiv.getElementsByClassName("finance-add-follow-class");
        var movers = [];

        console.log(companies);
        for (var i = 0; i < companies.length; i++) {

            // company
            var company = companies[i].title;

            //symbol
            var symbol = companies[i].text.replace("?", "");

            // lower case symbol (used to build id)
            var symLower = symbol.toLowerCase();

            // price
            var id = "yfs_l84_" + symLower;
            console.log("id: ", id);
            var price = document.getElementById(id).innerHTML;

            // change
            id = "yfs_c63_" + symLower;
            var change = document.getElementById(id).innerHTML;

            // percentage change
            id = "yfs_pp0_" + symLower;
            var percentChange = document.getElementById(id).innerHTML;

            // time           
            id = "yfs_t10_" + symLower;
            var time = document.getElementById(id).innerHTML;

            // volume
            id = "yfs_v53_" + symLower;
            var volume = document.getElementById(id).innerHTML;

            var mm = new mover(company, symbol, price, change, percentChange, time, volume);
            movers.push(mm);

            document.write(
                company + " " +
                symbol + " " +
                price + " " +
                change + " " +
                percentChange + " " +
                time + " " +
                volume + "<br>"
            );

        }
        console.log(movers);
        return movers;
      
    }

    function mover(company, symbol, price, change, percentChange, time, volume) {
        this.company = company;
        this.symbol = symbol;
        this.price = price;
        this.change = change;
        this.percentageChange = percentChange;
        this.time = time;
        this.volume = volume;
    }

    /**
 * Wait until the test condition is true or a timeout occurs. Useful for waiting
 * on a server response or for a ui change (fadeIn, etc.) to occur.
 *
 * @param testFx javascript condition that evaluates to a boolean,
 * it can be passed in as a string (e.g.: "1 == 1" or "$('#bar').is(':visible')" or
 * as a callback function.
 * @param onReady what to do when testFx condition is fulfilled,
 * it can be passed in as a string (e.g.: "1 == 1" or "$('#bar').is(':visible')" or
 * as a callback function.
 * @param timeOutMillis the max amount of time to wait. If not specified, 3 sec is used.
 */

"use strict";
function waitFor(testFx, onReady, timeOutMillis) {
    var maxtimeOutMillis = timeOutMillis ? timeOutMillis : 3000, //< Default Max Timout is 3s
        start = new Date().getTime(),
        condition = false,
        interval = setInterval(function() {
            if ( (new Date().getTime() - start < maxtimeOutMillis) && !condition ) {
                // If not time-out yet and condition not yet fulfilled
                condition = (typeof(testFx) === "string" ? eval(testFx) : testFx()); //< defensive code
            } else {
                if(!condition) {
                    // If condition still not fulfilled (timeout but condition is 'false')
                    console.log("'waitFor()' timeout");
                    phantom.exit(1);
                } else {
                    // Condition fulfilled (timeout and/or condition is 'true')
                    console.log("'waitFor()' finished in " + (new Date().getTime() - start) + "ms.");
                    typeof(onReady) === "string" ? eval(onReady) : onReady(); //< Do what it's supposed to do once the condition is fulfilled
                    clearInterval(interval); //< Stop this interval
                }
            }
        }, 250); //< repeat check every 250ms
};





    
