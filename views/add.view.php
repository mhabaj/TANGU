<div class="container-fluid" id="mainBox">
    <div id="titleBox">
        <h1 id="serieText"></h1><br><br>
        <h1 id="voleeText"></h1>
    </div>
    <br>
    <br>
    <p id="tirText"></p>
    <div id="target">
        <div id="target1"></div>
        <div id="subTarget1"></div>
        <div id="target2"></div>
        <div id="subTarget2"></div>
        <div id="target3"></div>
        <div id="subTarget3"></div>
        <div id="target4"></div>
        <div id="subTarget4"></div>
        <div id="target5"></div>
        <div id="subTarget5"></div>
        <div id="subTarget6"></div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    var target1 = document.getElementById('target1'),
        target2 = document.getElementById('target2'),
        target3 = document.getElementById('target3'),
        target4 = document.getElementById('target4'),
        target5 = document.getElementById('target5'),
        subTarget1 = document.getElementById('subTarget1'),
        subTarget2 = document.getElementById('subTarget2'),
        subTarget3 = document.getElementById('subTarget3'),
        subTarget4 = document.getElementById('subTarget4'),
        subTarget5 = document.getElementById('subTarget5'),
        subTarget6 = document.getElementById('subTarget6');


    var serieText = document.getElementById('serieText'),
        voleeText = document.getElementById('voleeText'),
        tirText = document.getElementById('tirText');

    var nbrSeries = 2,
        nbrVolees = 3,
        nbrTirs = 5,
        countSeries = 1,
        countVolees = 1,
        countTirs = 0;

    var nbr10 = 0,
        nbr9 = 0,
        nbr8 = 0;

    serieText.innerHTML = "Serie " + countSeries;
    voleeText.innerHTML = "Volee " + countVolees;

    function draw(x, y) {
        let point = document.createElement('div');
        point.className = "point";
        point.style.left = x + "px";
        point.style.top = y + "px";
        document.body.appendChild(point);
        console.log(point);
    }

    function handle(e) {

        let clientX = e.touches[0].clientX;
        let clientY = e.touches[0].clientY;

        if(countTirs >= nbrTirs) {
            greetings();
            if(countVolees >= nbrVolees) {
                if(countSeries >= nbrSeries) {
                    $('.point').remove();
                    console.log('Fin de entrainement');
                    killEvents();
                } else {
                    countVolees = 0;
                    countSeries++;
                }
            } else {
                nbr8 = 0;
                countTirs = 0;
                countVolees++;
                $('.point').remove();
            }
        } else {
            serieText.innerHTML = "Serie " + countSeries;
            voleeText.innerHTML = "Volee " + countVolees;
            draw(clientX, clientY);
            countTirs++;
            tirText.innerHTML = 'Plus que ' + (nbrTirs - countTirs) + ' tirs';
            console.log('Serie ' + countSeries + ' Volee '+ countVolees  + ' Tir ' + countTirs);
        }
    }

    function target1Handler(e) {
        handle(e);
    }

    function target2Handler(e) {
        handle(e);
    }

    function target3Handler(e) {
        handle(e);
        nbr8++;
    }

    function target4Handler(e) {
        handle(e);
        nbr9++;
    }

    function target5Handler(e) {
        handle(e);
        nbr10++;
    }

    function subTarget1Handler(e) {
        handle(e);
    }

    function subTarget2Handler(e) {
        handle(e);
    }

    function subTarget3Handler(e) {
        handle(e);
        nbr8++;
    }

    function subTarget4Handler(e) {
        handle(e);
        nbr9++;
    }

    function subTarget5Handler(e) {
        handle(e);
        nbr10++;
    }

    function subTarget6Handler(e) {
        handle(e);
        nbr10++;
    }


    function launchEvents() {
        target1.addEventListener('touchstart', target1Handler);
        target2.addEventListener('touchstart', target2Handler);
        target3.addEventListener('touchstart', target3Handler);
        target4.addEventListener('touchstart', target4Handler);
        target5.addEventListener('touchstart', target5Handler);

        subTarget1.addEventListener('touchstart', subTarget1Handler);
        subTarget2.addEventListener('touchstart', subTarget2Handler);
        subTarget3.addEventListener('touchstart', subTarget3Handler);
        subTarget4.addEventListener('touchstart', subTarget4Handler);
        subTarget5.addEventListener('touchstart', subTarget5Handler);
        subTarget6.addEventListener('touchstart', subTarget6Handler);
    }

    function killEvents() {
        target1.removeEventListener('touchstart', target1Handler);
        target2.removeEventListener('touchstart', target2Handler);
        target3.removeEventListener('touchstart', target3Handler);
        target4.removeEventListener('touchstart', target4Handler);
        target5.removeEventListener('touchstart', target5Handler);

        subTarget1.removeEventListener('touchstart', subTarget1Handler);
        subTarget2.removeEventListener('touchstart', subTarget2Handler);
        subTarget3.removeEventListener('touchstart', subTarget3Handler);
        subTarget4.removeEventListener('touchstart', subTarget4Handler);
        subTarget5.removeEventListener('touchstart', subTarget5Handler);
        subTarget6.removeEventListener('touchstart', subTarget6Handler);
    }

    function pct8() {
        return nbr8 / nbrTirs;
    }

    function pct9() {
        return nbr9 / nbrTirs;
    }

    function pct10() {
        return nbr10 / nbrTirs;
    }

    function greetings() {
        var pct8 = nbr8 / nbrTirs,
            pct9 = nbr9 / nbrTirs,
            pct10 = nbr10 / nbrTirs;

        var msg;

        if(pct8 > 0.9) {
            msg = "Pas mal!";
        }

        if(pct9 > 0.8) {
            msg = "Bien joué !";
        }

        if(pct10 > 0.8) {
            msg = "Wow!";
        }

        console.log(msg);
    }


launchEvents();

</script>