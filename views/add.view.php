<canvas id="confetti"></canvas>
<div class="container-fluid addTraining" id="mainBox">
    <?php include 'includes/back-header.php';?>
    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="newTrainingForm">
        <h3 id="formTitle">Add a new training</h3>
        <div id="nameField">
            <h3>Your Training Name</h3>
            <input type="text" name="name" id="nameInput" placeholder="Enter your training name...">
        </div>
        <div id="locationField">
            <h3>Your Training Location</h3>
            <input type="text" name="location" id="locationInput" placeholder="Enter your training location...">
        </div>
        <div id="dateField">
            <h3>The Date</h3>
            <input type="text" name="date" class="datepicker-here" id="dateInput" data-position="top left" data-timepicker="true" data-time-format='h:ii AA' data-language="fr" placeholder="Pick a date...">
        </div>
        <div id="distanceField">
            <h3>Distance</h3>
            <input type="number" name="distance" id="distanceInput"  min="1" max="30" placeholder="Distance...">
        </div>
        <div id="serieField">
            <h3>Series</h3>
            <input type="number" name="sets" id="serieInput" min = "1" max="3" placeholder="1">
        </div>
        <div id="arrowField">
            <h3>Arrows</h3>
            <input type="number" name="arrows" id="arrowInput" min = "1" max="10" placeholder="1">
        </div>
        <div id="volleyField">
            <h3>Volleys</h3>
            <input type="number" name="volleys" id="volleyInput" min = "1" max="6" placeholder="1">
        </div>
        <input type="submit" name="submitBtn" id="submitBtn" value="Let's practice !">
    </form>
    <? include 'includes/footer.php';?>
</div>
<div class="container-fluid currentTraining" id="mainBox">
    <div id="popUp">
        <h1 id="popUpMessage"></h1>
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
    let rightBtn = document.getElementById("right-btn");
    rightBtn.disabled = false;
    console.log(rightBtn);
    rightBtn.addEventListener('touchend', function () {
        window.location = "<?= $left_url;?>";
    });
</script>
<script>


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

    function targetInteractions() {
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
            voleeText = document.getElementById('voleeText');

        var nbrSeries = 2,
            nbrVolees = 2,
            nbrTirs = 3,
            countSeries = 1,
            countVolees = 1,
            countTirs = 0;

        var nbr10 = 0,
            nbr9 = 0,
            nbr8 = 0;

        var combo10 = 0;

        let target = document.getElementById("target");

        serieText.innerHTML = "Serie " + countSeries;
        voleeText.innerHTML = "Volee " + countVolees;

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
                case "target2":
                    combo10 = 0;
                    break;
                case "subTarget2":
                    combo10 = 0;
                    break;
                case "target3":
                    combo10 = 0;
                    nbr8++;
                    console.log(nbr8);
                    break;
                case "subTarget3":
                    combo10 = 0;
                    nbr8++;
                    console.log(nbr8);
                    break;
                case "target4":
                    combo10 = 0;
                    nbr9++;
                    break;
                case "subTarget4":
                    combo10 = 0;
                    nbr9++;
                    break;
                case "target5":
                    launchConfetti();
                    nbr10++;
                    combo10++;
                    checkCombo();
                    break;
                case "subTarget5":
                    launchConfetti();
                    nbr10++;
                    combo10++;
                    checkCombo();
                    break;
                case "subTarget6":
                    launchConfetti();
                    nbr10++;
                    combo10++;
                    checkCombo();
                    break;
                default:
            }
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
                            popUpMsgElement.innerHTML = "End of your training!";
                            showMessage(1000, 1500, false);
                            console.log('Fin de entrainement');

                        } else {
                            countVolees = 1;
                            countSeries++;
                            serieText.innerHTML = "Serie " + countSeries;
                            voleeText.innerHTML = "Volee " + countVolees;
                            popUpMsgElement.innerHTML = "Set " + countSeries;
                            showMessage(1000, 1500, true);
                        }
                    } else {
                        countVolees++;
                        nbr8 = 0;
                        voleeText.innerHTML = "Volee " + countVolees;
                        popUpMsgElement.innerHTML = "Volley " + countVolees;
                        showMessage(1000, 1500, true);
                        $('.point').remove();
                    }
                }, 1500);
            } else {
                draw(e, clientX, clientY);
                inc(e);
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

        launchTouchEvents();

        $(document).ready(function () {
            SetGlobals();

            $(window).resize(function () {
                W = window.innerWidth;
                H = window.innerHeight;
                canvas.width = W;
                canvas.height = H;
            });

        });
    }
</script>