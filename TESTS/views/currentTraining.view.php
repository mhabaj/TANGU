<canvas id="confetti"></canvas>
<div class="container-fluid currentTraining" id="mainBox">
    <div id="popUp">
        <h1 id="popUpMessage"></h1>
    </div>
    <div id="showTrainingData">
        <h3 id="serieText"></h3>
        <h3 id="voleeText"></h3>
        <p id="totalPts">Total Pts: 0</p>
        <p id="ptsVolee">Pts sur la volée: 0</p>
        <p id="ptsSerie">Pts sur la série: 0</p>
    </div>
    <div id="titleBox">
        <h3 id="serieText"></h3>
        <h3 id="voleeText"></h3>
    </div>
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
<script>
    var mainBox = document.getElementById('mainBox'),
        blurBckg = document.getElementById('blurBckg');

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

    var popUpElement = document.getElementById("popUp"),
        popUpMsgElement = document.getElementById("popUpMessage");

    var serieText = document.getElementById('serieText'),
        voleeText = document.getElementById('voleeText'),
        totalPtsText = document.getElementById('totalPts'),
        ptsVoleeText = document.getElementById("ptsVolee"),
        ptsSerieText = document.getElementById("ptsSerie");

    var nbrSeries = <?= $_GET['sets'];?>,
        nbrVolees = <?= $_GET['volleys'];?>,
        nbrTirs = <?= $_GET['arrows'];?>,
        countSeries = 1,
        countVolees = 1,
        countTirs = 0;

    let totalPts = 0,
        ptsVolee = 0,
        ptsSerie = 0;

    var nbr10 = 0,
        nbr9 = 0,
        nbr8 = 0;

    var combo10 = 0;

    let target = document.getElementById("target");

    let pts = [];
    for(let i = 0; i < nbrSeries; i++) {
        pts.push([]);
        for(let j = 0; j < nbrVolees; j++) {
            pts[i].push([]);
            for(let k = 0; k < nbrTirs; k++) {
                pts[i][j].push(0);
            }
        }
    }

    serieText.innerText = "Serie " + countSeries;
    voleeText.innerText = "Volee " + countVolees;

    function triggerPopUp(elem) {
        elem.classList.remove('animated-popdown');
        elem.style.display = "block";
        elem.classList.add('animated-popup');
    }

    function triggerPopDown(elem, delay) {
        elem.classList.remove('animated-popup');
        elem.classList.add('animated-popdown');
        window.setTimeout(function () {
            elem.style.display = "none";
        }, delay);
    }

    function showMessage(popTime, blurTime, relaunch) {
        killTouchEvents();
        blurInAnimation();
        let blurElements = document.getElementsByClassName('animated-blur');
        for (let i = 0; i < blurElements.length; i++) {
            blurElements[i].style.animationDuration = blurTime + "ms";
        }
        triggerPopUp(popUpElement);
        window.setTimeout(function () {
            triggerPopDown(popUpElement, 1000);
        }, popTime);
        window.setTimeout(blurEmptyAnimation, blurTime);
        if(relaunch) {
            window.setTimeout(launchTouchEvents, blurTime);
        }
    }

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
        let points = document.getElementsByClassName('point');
        var i;

        for(i = 0; i < points.length; i++) {
            points[i].classList.add('animated-blur');
        }
        target.classList.add('animated-blur');
    }

    function blurEmptyAnimation() {
        let points = document.getElementsByClassName('point');
        var i;

        for(i = 0; i < points.length; i++) {
            points[i].classList.remove('animated-blur');
        }
        target.classList.remove('animated-blur');
        document.body.classList.remove('animated-background');
    }

    function activateBlur(time) {
        blurInAnimation();
        window.setTimeout(blurEmptyAnimation, time);
    }

    function pointDisappear() {
        let points = document.getElementsByClassName('point');
        let i;

        for(i = points.length-1; i >= 0; i--) {
            points[i].classList.add('disappear-animation');
        }
    }

    function launchConfetti() {
        killTouchEvents();
        triggerPopUp(popUpElement);
        blurInAnimation();
        RestartConfetti();
        window.setTimeout(DeactivateConfetti, 1800);
        window.setTimeout(function () {
            triggerPopDown(popUpElement, 1000);
        }, 2000);
        window.setTimeout(function () {
            blurEmptyAnimation();
            launchTouchEvents();
        }, 4500);
    }

    function checkCombo() {
        if(combo10 > 1 && combo10 < 5) {
            popUpMsgElement.innerHTML = combo10 + " in a row !";
        } else if(combo10 == 5) {
            popUpMsgElement.innerHTML = combo10 + " in a row, WOW !";
        } else if(combo10 == 6) {
            popUpMsgElement.innerHTML = "You're a pro !";
        } else if(combo10 > 6) {
            popUpMsgElement.innerHTML = "Come On !!";
        } else {
            popUpMsgElement.innerHTML = "Well done !";
        }
    }

    function inc(e) {
        switch (e.target.id) {
            case "target1":
                combo10 = 0;
                totalPts += 1;
                ptsVolee += 1;
                ptsSerie += 1;
                pts[countSeries-1][countVolees-1][countTirs-1] = 1;
                totalPtsText.innerText = "Total Pts: " + totalPts;
                ptsVoleeText.innerText = "Pts sur la volée: " + ptsVolee;
                ptsSerieText.innerText = "Pts sur la série: " + ptsSerie;
                break;
            case "subTarget1":
                combo10 = 0;
                totalPts += 2;
                ptsVolee += 2;
                ptsSerie += 2;
                pts[countSeries-1][countVolees-1][countTirs-1] = 2;
                totalPtsText.innerText = "Total Pts: " + totalPts;
                ptsVoleeText.innerText = "Pts sur la volée: " + ptsVolee;
                ptsSerieText.innerText = "Pts sur la série: " + ptsSerie;
                break;
            case "target2":
                combo10 = 0;
                totalPts += 3;
                ptsVolee += 3;
                ptsSerie += 3;
                pts[countSeries-1][countVolees-1][countTirs-1] = 3;
                totalPtsText.innerText = "Total Pts: " + totalPts;
                ptsVoleeText.innerText = "Pts sur la volée: " + ptsVolee;
                ptsSerieText.innerText = "Pts sur la série: " + ptsSerie;
                break;
            case "subTarget2":
                combo10 = 0;
                totalPts += 4;
                ptsVolee += 4;
                ptsSerie += 4;
                pts[countSeries-1][countVolees-1][countTirs-1] = 4;
                totalPtsText.innerText = "Total Pts: " + totalPts;
                ptsVoleeText.innerText = "Pts sur la volée: " + ptsVolee;
                ptsSerieText.innerText = "Pts sur la série: " + ptsSerie;
                break;
            case "target3":
                combo10 = 0;
                totalPts += 5;
                ptsVolee += 5;
                ptsSerie += 5;
                pts[countSeries-1][countVolees-1][countTirs-1] = 5;
                totalPtsText.innerText = "Total Pts: " + totalPts;
                ptsVoleeText.innerText = "Pts sur la volée: " + ptsVolee;
                ptsSerieText.innerText = "Pts sur la série: " + ptsSerie;
                break;
            case "subTarget3":
                combo10 = 0;
                totalPts += 6;
                ptsVolee += 6;
                ptsSerie += 6;
                pts[countSeries-1][countVolees-1][countTirs-1] = 6;
                totalPtsText.innerText = "Total Pts: " + totalPts;
                ptsVoleeText.innerText = "Pts sur la volée: " + ptsVolee;
                ptsSerieText.innerText = "Pts sur la série: " + ptsSerie;
                break;
            case "target4":
                combo10 = 0;
                totalPts += 7;
                ptsVolee += 7;
                ptsSerie += 7;
                pts[countSeries-1][countVolees-1][countTirs-1] = 7;
                totalPtsText.innerText = "Total Pts: " + totalPts;
                ptsVoleeText.innerText = "Pts sur la volée: " + ptsVolee;
                ptsSerieText.innerText = "Pts sur la série: " + ptsSerie;
                break;
            case "subTarget4":
                combo10 = 0;
                totalPts += 8;
                ptsVolee += 8;
                ptsSerie += 8;
                pts[countSeries-1][countVolees-1][countTirs-1] = 8;
                totalPtsText.innerText = "Total Pts: " + totalPts;
                ptsVoleeText.innerText = "Pts sur la volée: " + ptsVolee;
                ptsSerieText.innerText = "Pts sur la série: " + ptsSerie;
                nbr8++;
                break;
            case "target5":
                combo10 = 0;
                totalPts += 9;
                ptsVolee += 9;
                ptsSerie += 9;
                pts[countSeries-1][countVolees-1][countTirs-1] = 9;
                totalPtsText.innerText = "Total Pts: " + totalPts;
                ptsVoleeText.innerText = "Pts sur la volée: " + ptsVolee;
                ptsSerieText.innerText = "Pts sur la série: " + ptsSerie;
                nbr9++;
                break;
            case "subTarget5":
                launchConfetti();
                totalPts += 10;
                ptsVolee += 10;
                ptsSerie += 10;
                pts[countSeries-1][countVolees-1][countTirs-1] = 10;
                totalPtsText.innerText = "Total Pts: " + totalPts;
                ptsVoleeText.innerText = "Pts sur la volée: " + ptsVolee;
                ptsSerieText.innerText = "Pts sur la série: " + ptsSerie;
                nbr10++;
                combo10++;
                checkCombo();
                break;
            case "subTarget6":
                launchConfetti();
                totalPts += 10;
                ptsVolee += 10;
                ptsSerie += 10;
                pts[countSeries-1][countVolees-1][countTirs-1] = 10;
                totalPtsText.innerText = "Total Pts: " + totalPts;
                ptsVoleeText.innerText = "Pts sur la volée: " + ptsVolee;
                ptsSerieText.innerText = "Pts sur la série: " + ptsSerie;
                nbr10++;
                combo10++;
                checkCombo();
                break;
            default:
        }
    }

    function sendData(str) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            }
        };
        console.log(window.location.href);
        let currentURL = window.location.href,
            newURL = currentURL + "&data=" + str;
        xmlhttp.open("GET", newURL, true);
        xmlhttp.send();
        window.setTimeout(function () {
            window.location.href = newURL;
        }, 1500);
    }

    function touchHandler(e) {
        let clientX = e.changedTouches[0].clientX,
            clientY = e.changedTouches[0].clientY;

        countTirs++;
        if(countTirs >= nbrTirs) {
            if(countTirs == nbrTirs) {
                draw(e, clientX, clientY);
                inc(e);
                console.log('Serie ' + countSeries + ' Volee '+ countVolees  + ' Tir ' + countTirs);
                window.setTimeout(function () {
                    $('.point').remove();
                }, 1400);
                window.setTimeout(pointDisappear, 300);
            }
            countTirs = 0;
            window.setTimeout(function () {
                if(countVolees >= nbrVolees) {

                    if(countSeries >= nbrSeries) {
                        //$('.point').remove();
                        //console.log(pts);
                        let ptsArray = JSON.stringify(pts);

                        popUpMsgElement.innerHTML = "Fin de l'entrainement";
                        showMessage(1000, 1500, false);
                        sendData(ptsArray);

                    } else {
                        //Nouvelle Serie
                        countVolees = 1;
                        ptsSerie = 0;
                        ptsVolee = 0;
                        countSeries++;
                        serieText.innerHTML = "Serie " + countSeries;
                        voleeText.innerHTML = "Volee " + countVolees;
                        popUpMsgElement.innerHTML = "Set " + countSeries;
                        showMessage(1000, 1500, true);
                        ptsSerieText.innerText = "Pts sur la série: " + ptsSerie;
                        ptsVoleeText.innerText = "Pts sur la volée: " + ptsVolee;
                    }
                } else {
                    //Nouvelle Volee
                    countVolees++;
                    ptsVolee = 0;
                    nbr8 = 0;
                    voleeText.innerHTML = "Volee " + countVolees;
                    popUpMsgElement.innerHTML = "Volley " + countVolees;
                    showMessage(1000, 1500, true);
                    ptsVoleeText.innerText = "Pts sur la volée: 0";
                    $('.point').remove();
                }
            }, 1500);
        } else {
            draw(e, clientX, clientY);
            inc(e);
            console.log(pts);
            console.log('Serie ' + countSeries + ' Volee '+ countVolees  + ' Tir ' + countTirs);
            if(countTirs == (nbrTirs - 1)) {
                popUpMsgElement.innerHTML = "Last shot!";
                showMessage(1000, 1500, true);
            }
        }
    }

    function moveHandler(e) {
        switch (e.target.id) {
            case "target2":
                console.log('from t2');
                break;
            case "subTarget2":
                console.log('from st2');
                break;
            case "target3":
                console.log('from t3');
                break;
            case "subTarget3":
                console.log('from st3');
                break;
            case "target4":
                console.log('from t4');
                break;
            case "subTarget4":
                console.log('from st4');
                break;
            case "target5":
                console.log('from t5');
                break;
            case "subTarget5":
                break;
            case "subTarget6":
                break;
            default:
        }

        let clientX = e.changedTouches[0].clientX,
            clientY = e.changedTouches[0].clientY;

        console.log('X: ' + clientX + ', Y: ' + clientY);
        draw(e, clientX, clientY);

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

    function killMoveEvents() {
        target1.removeEventListener('touchmove', moveHandler);

        target2.removeEventListener('touchmove', moveHandler);
        target3.removeEventListener('touchmove', moveHandler);
        target4.removeEventListener('touchmove', moveHandler);
        target5.removeEventListener('touchmove', moveHandler);

        subTarget1.removeEventListener('touchmove', moveHandler);
        subTarget2.removeEventListener('touchmove', moveHandler);
        subTarget3.removeEventListener('touchmove', moveHandler);
        subTarget4.removeEventListener('touchmove', moveHandler);
        subTarget5.removeEventListener('touchmove', moveHandler);
        subTarget6.removeEventListener('touchmove', moveHandler);
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

    $(document).ready(function () {
        SetGlobals();

        $(window).resize(function () {
            W = window.innerWidth;
            H = window.innerHeight;
            canvas.width = W;
            canvas.height = H;
        });

    });

    launchTouchEvents();
</script>