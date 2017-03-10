

       
            
           // console.clear();
           // console.log(allMovers);

            function getAllMovers() {
                debugger;
                var actives = getMovers("actives");
                var gainers = getMovers("gainers");
                var losers = getMovers("losers");
                var allMovers = [actives, gainers, losers];
                return allMovers;
            }

            function getMovers(type) {
                var movers = [];
                var el = document.getElementById(type);
                var children = el.getElementsByTagName("ul");
                for (var i = 0; i < children.length; i++) {
                    var item = children[i].getElementsByClassName("company");
                    var company = item[0].getElementsByClassName("company-name")[0].textContent.trim();
                    var symbol = item[0].getElementsByClassName("ticker")[0].textContent.trim();
                    console.log(company, symbol);

                    item = children[i].getElementsByClassName("price")[0];
                    var price = item.getElementsByClassName("start")[0].textContent.trim();
                    console.log(price);

                    var change = children[i].getElementsByClassName("change")[0].textContent.trim();
                    console.log(change);

                    var percentChange = children[i].getElementsByClassName("changepercent")[0].textContent.trim();
                    console.log(percentChange);

                    item = children[i].getElementsByClassName("volume")[0];
                    var volume = item.getElementsByClassName("start")[0].textContent.trim();
                    console.log(volume);

                    var mm = new mover(type, company, symbol, price, change, percentChange, volume);
                    movers.push(mm);
                    console.log(mm);
                }
               // console.clear();
                return movers;
                console.log(movers);
            }
            function mover(type, company, symbol, price, change, percentChange, volume) {
                this.type = type;
                this.company = company;
                this.symbol = symbol;
                this.price = price;
                this.change = change;
                this.percentageChange = percentChange;
                this.volume = volume;
            }
       
  