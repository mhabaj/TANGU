<div class="container-fluid" id="mainBox">
    <!--
    <div id="titleBox">
        <h1 id="serieText"></h1><br><br>
        <h1 id="voleeText"></h1>
    </div>
    <br>
    <br>
    --->
    <div id="target">
        <div id="target1">
        </div>
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
<script src='https://unpkg.com/panzoom@7.0.2/dist/panzoom.min.js'></script>
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

    var touchDuration = 600,
        timer,
        lockTimer;

    var nbrSeries = 2,
        nbrVolees = 3,
        nbrTirs = 5,
        countSeries = 1,
        countVolees = 1,
        countTirs = 0;

    var nbr10 = 0,
        nbr9 = 0,
        nbr8 = 0;

    let target = document.getElementById("target");

    //serieText.innerHTML = "Serie " + countSeries;
    //voleeText.innerHTML = "Volee " + countVolees;


    function draw(x, y) {
        let point = document.createElement('div');
        point.className = "point";
        point.style.top = y + "px";
        point.style.left = x + "px";
        document.body.appendChild(point);
    }

    function touchHandler(e) {
        let clientX = e.changedTouches[0].clientX,
            clientY = e.changedTouches[0].clientY;
        if(countTirs >= nbrTirs) {
            greetings();
            if(countVolees >= nbrVolees) {
                if(countSeries >= nbrSeries) {
                    $('.point').remove();
                    console.log('Fin de entrainement');
                    killTouchEvents();
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
            //serieText.innerHTML = "Serie " + countSeries;
            //voleeText.innerHTML = "Volee " + countVolees;
            //tirText.innerHTML = 'Plus que ' + (nbrTirs - countTirs) + ' tirs';
            draw(clientX, clientY);
            countTirs++;
            console.log('Serie ' + countSeries + ' Volee '+ countVolees  + ' Tir ' + countTirs);
        }
    }

    function target1Handler(e) {
        touchHandler(e);
    }

    function target2Handler(e) {
        touchHandler(e);
    }

    function target3Handler(e) {
        touchHandler(e);
        nbr8++;
    }

    function target4Handler(e) {
        touchHandler(e);
        nbr9++;
    }

    function target5Handler(e) {
        touchHandler(e);
        nbr10++;
    }

    function subTarget1Handler(e) {
        touchHandler(e);
    }

    function subTarget2Handler(e) {
        touchHandler(e);
    }

    function subTarget3Handler(e) {
        touchHandler(e);
        nbr8++;
    }

    function subTarget4Handler(e) {
        touchHandler(e);
        nbr9++;
    }

    function subTarget5Handler(e) {
        touchHandler(e);
        nbr10++;
    }

    function subTarget6Handler(e) {
        touchHandler(e);
        nbr10++;
    }


    function launchTouchEvents() {
        target1.addEventListener('touchend', touchHandler);

        target2.addEventListener('touchend', touchHandler);
        target3.addEventListener('touchend', touchHandler);
        target4.addEventListener('touchend', touchHandler);
        target5.addEventListener('touchend', touchHandler);

        subTarget1.addEventListener('touchend', touchHandler);
        subTarget2.addEventListener('touchend', touchHandler);
        subTarget3.addEventListener('touchend', touchHandler);
        subTarget4.addEventListener('touchend', touchHandler);
        subTarget5.addEventListener('touchend', touchHandler);
        subTarget6.addEventListener('touchend', touchHandler);
    }

    function killTouchEvents() {
        target1.removeEventListener('touchend', touchHandler);
        target2.removeEventListener('touchend', touchHandler);
        target3.removeEventListener('touchend', touchHandler);
        target4.removeEventListener('touchend', touchHandler);
        target5.removeEventListener('touchend', touchHandler);

        subTarget1.removeEventListener('touchend', touchHandler);
        subTarget2.removeEventListener('touchend', touchHandler);
        subTarget3.removeEventListener('touchend', touchHandler);
        subTarget4.removeEventListener('touchend', touchHandler);
        subTarget5.removeEventListener('touchend', touchHandler);
        subTarget6.removeEventListener('touchend', touchHandler);
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
            console.log(pct8);
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

    launchTouchEvents();
</script>