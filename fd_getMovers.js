

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
        return movers;
        console.log(movers);
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
