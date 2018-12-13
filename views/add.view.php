<canvas id="confetti"></canvas>
<div class="container-fluid header" id="headerBox">
    <div id="titleBox">
        <h1 id="serieText"></h1>
        <h1 id="voleeText"></h1>
    </div>
</div>
<div class="container-fluid" id="mainBox">
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

    let points = document.getElementsByClassName('point');

    var serieText = document.getElementById('serieText'),
        voleeText = document.getElementById('voleeText');

    var nbrSeries = 1,
        nbrVolees = 1,
        nbrTirs = 5,
        countSeries = 1,
        countVolees = 1,
        countTirs = 0;

    var nbr10 = 0,
        nbr9 = 0,
        nbr8 = 0;

    let target = document.getElementById("target");

    serieText.innerHTML = "Serie " + countSeries;
    voleeText.innerHTML = "Volee " + countVolees;

    function draw(e, x, y) {
        let point = document.createElement('div');
        point.className = "point";
        switch (e.target.id) {
            case "target2":
                point.style.backgroundColor = "rgba(179, 179, 255, .9)";
                break;
            case "subTarget2":
                point.style.backgroundColor = "rgba(179, 179, 255, .9)";
                break;
            case "target3":
                point.style.backgroundColor = "rgba(128, 191, 254, .9)";
                break;
            case "subTarget3":
                point.style.backgroundColor = "rgba(128, 191, 254, .9)";
                break;
            case "target4":
                point.style.backgroundColor = "rgba(251, 106, 116, 0.9)";
                break;
            case "subTarget4":
                point.style.backgroundColor = "rgba(251, 106, 116, 0.9)";
                break;
            case "target5":
                point.style.backgroundColor = "rgba(253, 226, 104, 0.9)";
                break;
            case "subTarget5":
                point.style.backgroundColor = "rgba(253, 226, 104, 0.9)";
                break;
            case "subTarget6":
                point.style.backgroundColor = "rgba(253, 226, 104, 0.9)";
                break;
            default:
        }
        point.style.top = y + "px";
        point.style.left = x + "px";
        document.body.appendChild(point);
    }

    function blurInAnimation() {
        target.style.animation = "blurInAnim 3.5s linear infinite";
        /*for(i = 0; i < points.length; i++) {
            points[i].style.animation = "blurInAnim 3.5s linear";
        }*/
    }

    function launchConfetti() {
        killTouchEvents();
        blurInAnimation();
        RestartConfetti();
        window.setTimeout(DeactivateConfetti, 1800);
        window.setTimeout(launchTouchEvents, 2800);
    }

    function inc(e) {
        switch (e.target.id) {
            case "target2":

                break;
            case "subTarget2":

                break;
            case "target3":
                nbr8++;
                console.log(nbr8);
                break;
            case "subTarget3":
                nbr8++;
                console.log(nbr8);
                break;
            case "target4":
                nbr9++;
                break;
            case "subTarget4":
                nbr9++;
                break;
            case "target5":
                launchConfetti();
                nbr10++;
                break;
            case "subTarget5":
                launchConfetti();
                nbr10++;
                break;
            case "subTarget6":
                launchConfetti();
                nbr10++;
                break;
            default:
        }
    }

    function touchHandler(e) {
        let clientX = e.changedTouches[0].clientX,
            clientY = e.changedTouches[0].clientY;

        if(countTirs >= nbrTirs) {
            greetings();
            if(countVolees >= nbrVolees) {
                if(countSeries >= nbrSeries) {
                    //$('.point').remove();
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
            serieText.innerHTML = "Serie " + countSeries;
            voleeText.innerHTML = "Volee " + countVolees;
            draw(e, clientX, clientY);
            countTirs++;
            inc(e);
            console.log('Serie ' + countSeries + ' Volee '+ countVolees  + ' Tir ' + countTirs);
        }
    }

    function moveHandler(e) {
        switch (e.target.id) {
            case "target2":
                console.log('hover t2');
                break;
            case "subTarget2":
                console.log('hover st2');
                break;
            case "target3":
                console.log('hover t3');
                break;
            case "subTarget3":
                console.log('hover st3');
                break;
            case "target4":
                console.log('hover t4');
                break;
            case "subTarget4":
                console.log('hover st4');
                break;
            case "target5":
                console.log('hover t5');
                break;
            case "subTarget5":
                break;
            case "subTarget6":
                break;
            default:
        }
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

    function launchMoveEvents() {
        target1.addEventListener('touchmove', moveHandler);

        target2.addEventListener('touchmove', moveHandler);
        target3.addEventListener('touchmove', moveHandler);
        target4.addEventListener('touchmove', moveHandler);
        target5.addEventListener('touchmove', moveHandler);

        subTarget1.addEventListener('touchmove', moveHandler);
        subTarget2.addEventListener('touchmove', moveHandler);
        subTarget3.addEventListener('touchmove', moveHandler);
        subTarget4.addEventListener('touchmove', moveHandler);
        subTarget5.addEventListener('touchmove', moveHandler);
        subTarget6.addEventListener('touchmove', moveHandler);
    }

    function greetings() {
        var pct8 = nbr8 / nbrTirs,
            pct9 = nbr9 / nbrTirs,
            pct10 = nbr10 / nbrTirs;

        var msg;

        if(pct8 >= 0.9) {
            msg = "Pas mal!";
        }

        if(pct9 >= 0.7) {
            msg = "Bien joué !";
        }

        if(pct10 >= 0.8) {
            msg = "Wow!";
        }

        console.log(msg);
    }

    launchMoveEvents();

    $(document).ready(function () {
        SetGlobals();

        $(window).resize(function () {
            W = window.innerWidth;
            H = window.innerHeight;
            canvas.width = W;
            canvas.height = H;
        });

    });

</script>