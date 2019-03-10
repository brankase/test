

            var tabla = [0, 0, 0, 0, 0,
                0, 0, 0, 0, 0,
                0, 0, 0, 0, 0,
                0, 0, 0, 0, 0];
            var indexPrveKarte = -1, indexDrugeKarte = -1;
            var otkriveni_parovi = 0;
            var poslParReset = false;

            var sekunde = 0, minute = 0;
            var vreme = document.querySelector("#vreme")
            var interval;
    var backs = document.getElementsByClassName("back");
    var fronts = document.getElementsByClassName("front");

            function resetIgre() {
                tabla = [0, 0, 0, 0, 0,
                    0, 0, 0, 0, 0,
                    0, 0, 0, 0, 0,
                    0, 0, 0, 0, 0];
                indexPrveKarte = -1, indexDrugeKarte = -1;
                otkriveni_parovi = 0;
                poslParReset = false;

                sekunde = 0, minute = 0;

                 for (let i = 0; i < backs.length; i++) {
                    backs[i].style.display = "block";
                 }
            }

            function startTimer() {
                if (interval) {
                    clearInterval(interval);           
                }
                interval = setInterval(function () {
                    vreme.innerHTML = minute + "min " + sekunde + "sec"
                    sekunde++;
                    if (sekunde == 60) {
                        minute++;
                        sekunde = 0;
                    }
                }, 1000);
            }
           
            function okreniKartu() {
                
                for (let i = 0; i < backs.length; i++) {
                    backs[i].addEventListener("click", function () {
                        if (zapocetaIgra === false) return;
                        //*** zatvoriti prethodni par. Pise se ovde, ali uradite ovaj korak tek kad uradite sve donje korake.
                        //console.log('Prvi ', indexPrveKarte, indexDrugeKarte);
                        if (poslParReset == true) {
                            tabla[indexPrveKarte] = 0;
                            tabla[indexDrugeKarte] = 0;
                            backs[indexPrveKarte].style.display = "block";
                            backs[indexDrugeKarte].style.display = "block";
                            poslParReset = false;
                            indexPrveKarte = -1;
                            indexDrugeKarte = -1;
                        }

                        if (tabla[i] != 0)
                            return;
                        else
                            tabla[i] = 1;
                        //ako matrica[i] nije nula, iskoci iz fje. (return)
                        //u suprotnom upisati 1 na to mesto i naredbu koja vec postoji:
                        this.style.display = "none";

                        if (indexPrveKarte == -1)
                            indexPrveKarte = i;
                        else {
                            if (fronts[i].src == fronts[indexPrveKarte].src) {
                                otkriveni_parovi++;
                                if (otkriveni_parovi == 10) {
                                    krajPartije();
                                }
                                poslParReset = false;
                                indexPrveKarte = -1;
                                indexDrugeKarte = -1;
                            } else {

                                poslParReset = true;
                            }
                            indexDrugeKarte = i;
                        }
                       
                        
                    })
                }
            }

            var slike = [];
            function napraviKarte() {
                //napraviti niz od 10 src slika
                var karte = ["lav.jpg", "leopard.jpg", "jez.jpg", "vuk.jpg", "veverica.jpg", "zec.png", "lisica.jpg", "slon.jpg", "koala.jpg", "medved.jpg"];

                for (var i = 0; i < 10; i++) {
                    for (var j = 0; j < 2; j++) {
                        var div = document.createElement("div");
                        var sl = document.createElement("img");
                        sl.src = 'slike/'+ karte[i];
                        sl.classList.add("front");

                        var sl2 = document.createElement("img");
                        sl2.src = "pozadina.jpg";
                        sl2.classList.add("back");

                        div.appendChild(sl);
                        div.appendChild(sl2);

                        document.querySelector("#tabla").appendChild(div);
                    }
                }
            }
            var zapocetaIgra = false;
            function pocniIgru() {
                resetIgre();
                startTimer();

                zapocetaIgra = true;


                var fronts = document.getElementsByClassName("front");
                //slike = [];
                for (let i = 0; i < fronts.length; i++)
                    slike.push(fronts[i].src);
                //var pon={};
                for (let i = 0; i < fronts.length; i++) {
                    var j = Math.floor(Math.random() * fronts.length)
                    var p = slike[i];
                    slike[i] = slike[j];
                    slike[j] = p;
                }
                for (let i = 0; i < fronts.length; i++)
                    fronts[i].src = slike[i];

            }
            var pobednici = [];
            var st = localStorage.getItem("pobednici");
                if (st != null) pobednici = JSON.parse(st);

            console.log(pobednici);
            
            //ucitavanje iz localStorage
            //prikaz preko console.log (ksasnije u div)
            function krajPartije(){
            
                if (interval) {
                    clearInterval(interval);
                }
                alert("Partija završena");

                var imePobednika =prompt("Unesi ime");
                var vreme = minute*60+sekunde;
                      pobednici.push({ime:imePobednika,vreme:vreme})


                    var st = JSON.stringify(pobednici);
                    localStorage.setItem("pobednici", st);
                    
                
            }
            napraviKarte();
            okreniKartu();

            document.querySelector("#nigra").onclick = pocniIgru;
            document.querySelector("#kraj").onclick = krajPartije;
            
        
        